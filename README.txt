
DRUPAL CHALLENGE - Jessica Olivo.
---------------------

 * Restoring Drupal 8 Site

 Installing from an existing Configuration ( using Drush )

 Requirements :

 - Drush (any version).

 Please follow the next steps :

 1. Clone this repository in your computer

 git clone https://github.com/jaop2316/myplanet-challenge.git

 2. Go to repository folder

 cd /path/myplanet-challenge

 3. Run the next drush command :

drush site-install config_installer --account-name=admin --account-pass=admin --account-mail=jessica.olivo@jobsity.io
config_installer_sync_configure_form.sync_directory=sites/default/config
--db-url=mysql://root:@127.0.0.1:33067/drupalchallenge --yes

The command execution start Drupal installation, this take a while.

4. When the command execution finish you will show the next alert

Installation complete.  User name: admin  User password: admin
Congratulations, you installed Drupal!

5. The credentials are:

username: admin
password: admin


