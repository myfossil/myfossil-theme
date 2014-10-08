# myfossil

WordPress based CMS for the myFOSSIL project.


## Development

### Workflow

This repository encompasses several other repositories into a coherent, working
version of the myFOSSIL website. 

In order to make development easier for everyone, we've chosen to use
`subtrees` rather than `submodules`--this way you can develop under this parent
project and commit changes back to the other repositories.


#### Reference

If you are unfamiliar with this workflow, read a [git subtree
tutorial](https://medium.com/@v/git-subtrees-a-tutorial-6ff568381844) to get
caught up.


#### Child Repositories

| Repository                                                          | Type   | Path (i.e. `prefix`)                       |
|---------------------------------------------------------------------|--------|--------------------------------------------|
| [WordPress](https://github.com/myfossil/WordPress) (fork)           | core   | `src/wp-core`                              |
| [BuddyPress](https://github.com/myfossil/BuddyPress) (fork)         | plugin | `src/wp-content/plugins/buddypress`        |
| [bbPress](https://github.com/myfossil/bbpress) (fork)               | plugin | `src/wp-content/plugins/bbpress`           |
| [myfossil-specimen](https://github.com/myfossil/wp-plugin-specimen) | plugin | `src/wp-content/plugins/myfossil-specimen` |
| [myfossil-logging](https://github.com/myfossil/wp-plugin-logging)   | plugin | `src/wp-content/plugins/myfossil-logging`  |
| [myfossil-theme](https://github.com/myfossil/wp-theme-myfossil)     | theme  | `src/wp-content/themes/myfossil`           |


### Environment

To get an up-and-running development environment, you will need to install the
following software:

- git
- Vagrant
- (vagrant plugins)

Then perform the following actions:

```
$ ./git-update.sh
$ vagrant up
$ vagrant ssh
vagrant$ /vagrant/puppet/dev_db_deploy.sh
```

> **Note**: Documentation incomplete.

