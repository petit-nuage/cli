# How to use

## Python requirements

```
pip install fabric
pip install pystache
```

## Installation

1. Just pull this repository
2. ```source bin/flow.sh```
3. Write your configuration file

## Configuration file (default: flow.json)

```json
{
	// Project
	"project": {
		"name": "cake-blog",
		"repository": "git@github.com:nicolasramy/cakephp-blog.git"
	},

	// Roles
	"roles": {
		"local": "localhost",
		"test": "localhost",
		"stage": "www-data@domain.dev",
		"master": "www-data@domain.prod"
	},

	// Environments
	// Local
	"local": {},
	// Stage
	"stage": {
		"env": "stage",
		"host": "www-data@domain.dev",
		"workspace": "/var/www",
		"app": {
			"type": "cakephp",
			"web": "nginx_phpfpm",
			"databases": {
				"default": {
					"hostname": "localhost",
					"username": "root",
					"password": "",
					"port": 3306
				}
			}
		}
	},
	// Test
	"test": {},
	// Deploy
	"deploy": {}
}
```

## Server requirements

- You have to push your ssh public key on your server for the correct user.
- Create a virtual host configuration for your stage domain. (i.e. ASAP)
- Add your public key on your git hosting provider

## man
```
flow command branch

The most commonly command used flow commands are:
    build   Build package based on branch
    deploy  Deploy master branch to production
    test    Test a branch
    stage   Create or synchronise stage environment for branch
    unstage   Remove stage environment for branch
```

# For instance

Only __stage__ and __unstage__ work.

It's based on workspace and repository. This 2 sub modules do some stuffs with fabric. I'm really happy of this simplification of automation. System operations had never been so simple.

# Next step

I have to finish the stage part. I want to add a configuration loader for specific application as:

- CakePHP 2
- Symfony 2
- WordPress
- AngularJS
- Flask

Prepare build command. What kind of test ? How to prepare a build and how to deploy it on master ...
