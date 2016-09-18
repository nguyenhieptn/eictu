<?php
// Use in the "Post-Receive URLs" section of your GitHub repo.
$out = shell_exec( 'git reset --hard origin/master 2>&1;git pull 2>&1' );
echo '<pre>'.$out.'</pre>';
// && find . -type f -exec chmod 0644 {} && find . -type d -exec chmod 0755 {}
?>
