# myfossil
WordPress based CMS for the myFOSSIL project.

## Development
```
$ git pull && git submodule init && git submodule update && git submodule status
$ cp src/wp-config.php.sample src/wp-config.php
$ vagrant up
$ vagrant ssh
vagrant$ /vagrant/puppet/dev_db_deploy.sh
```
