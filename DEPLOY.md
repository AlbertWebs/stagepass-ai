# Stagepass deployment

## Target

- Site: <https://sp.designekta.com/>
- Server: `ubuntu@13.50.244.3` (AWS EC2)
- Application directory: `/var/www/stagepass-ai`
- Nginx document root: `/var/www/stagepass-ai/public`
- PHP-FPM socket: `/run/php/php8.5-fpm.sock`
- SSH key: `./econfirm.pem` in the local project root
- Server runtime observed on 2026-10-29: PHP 8.5.4, Composer 2.9.5, Node.js 22.22.1

The PEM is a local private key. Keep it out of Git, deployment archives, and the server. Its contents do not belong in this file.

## SSH access

The machine's system SSH configuration currently fails its permissions check, so use `-F /dev/null` to bypass it. The first connection should save the server host key in the normal user `known_hosts` file; verify the fingerprint with the server administrator if the host key changes.

```sh
ssh -F /dev/null \
  -i ./econfirm.pem \
  -o IdentitiesOnly=yes \
  -o StrictHostKeyChecking=accept-new \
  ubuntu@13.50.244.3
```

The key currently has mode `0400`, which is suitable for OpenSSH.

## Build and deploy

The server checkout is not a clean Git checkout. On 2026-10-29 it was on `main` at `8b47326` (`Initial Commit`), tracking `origin/main`, with modified and untracked application files. The local working tree also contains the intended uncommitted site changes. Do not use `git pull`, `git reset`, or `rsync --delete` as a deployment shortcut. Back up the server tree first and review the sync preview so the existing `.env`, storage, dependencies, and server-only files stay intact.

Older server backup archives were removed on 2026-11-03 to recover disk space. The command below creates a fresh private backup before each deployment; keep only the archives needed for rollback and remove obsolete ones when disk space is low.

Run these steps from the local project root:

1. Build the frontend assets:

   ```sh
   npm run build
   ```

2. Create a private backup on the server:

   ```sh
   ssh -F /dev/null -i ./econfirm.pem -o IdentitiesOnly=yes -o StrictHostKeyChecking=accept-new ubuntu@13.50.244.3 \
     'umask 077; backup="/home/ubuntu/backups/stagepass-ai-$(date +%Y%m%d-%H%M%S).tar.gz"; tar -C /var/www -czf "$backup" stagepass-ai && chmod 600 "$backup" && echo "$backup"'
   ```

3. Preview the file sync. This preserves server environment files, Git history, storage, and installed dependencies, and excludes the local private key:

   ```sh
   rsync -azn --itemize-changes \
     -e 'ssh -F /dev/null -i ./econfirm.pem -o IdentitiesOnly=yes -o StrictHostKeyChecking=accept-new' \
     --exclude='.git/' \
     --exclude='.env' \
     --exclude='econfirm.pem' \
   --exclude='*.pem' \
     --exclude='vendor/' \
     --exclude='node_modules/' \
     --exclude='storage/' \
     --exclude='bootstrap/cache/' \
     --exclude='database/' \
     --exclude='tests/' \
     --exclude='phpunit.xml' \
   --exclude='.aws/' \
   --exclude='.agents/' \
   --exclude='.claude/' \
   --exclude='.codex/' \
   --exclude='.mcp.json' \
   --exclude='AGENTS.md' \
   --exclude='CLAUDE.md' \
   --exclude='public/hot' \
     ./ ubuntu@13.50.244.3:/var/www/stagepass-ai/
   ```

   Review the preview, especially the files already modified on the server. If it is correct, repeat the same command without `-n` to sync the files. Do not add `--delete`: this server contains files that are not present in the local checkout.

4. Install locked production PHP dependencies and refresh Laravel caches:

   ```sh
   ssh -F /dev/null -i ./econfirm.pem -o IdentitiesOnly=yes -o StrictHostKeyChecking=accept-new ubuntu@13.50.244.3 \
     'cd /var/www/stagepass-ai && composer install --no-dev --optimize-autoloader --no-interaction && php artisan optimize'
   ```

5. Verify the site responds:

   ```sh
   curl --fail --silent --show-error --output /dev/null --write-out 'HTTP %{http_code}\n' https://sp.designekta.com/
   ```

No database migration was identified for this site update. If a later release adds migrations, review them before running `php artisan migrate --force` on the server.

## Rollback

Use the backup path printed in step 2. A full restore also restores `.env` and `storage` to their backup-time state; copy out any newer environment or upload data before restoring. To inspect an archive without restoring it:

```sh
ssh -F /dev/null -i ./econfirm.pem -o IdentitiesOnly=yes -o StrictHostKeyChecking=accept-new ubuntu@13.50.244.3 \
  'tar -tzf /home/ubuntu/backups/REPLACE_WITH_BACKUP.tar.gz | head -40'
```

After confirming the backup filename, a full restore is:

```sh
ssh -F /dev/null -i ./econfirm.pem -o IdentitiesOnly=yes -o StrictHostKeyChecking=accept-new ubuntu@13.50.244.3 \
  'tar -C /var/www -xzf /home/ubuntu/backups/REPLACE_WITH_BACKUP.tar.gz'
```
