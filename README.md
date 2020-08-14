# seat-squad-sync
A module for [SeAT](https://github.com/eveseat/seat) that allows for creating a link between the members of a 

[![Latest Stable Version](https://img.shields.io/packagist/v/cryptaeve/seat-squad-sync.svg?style=flat-square)]()
[![License](https://img.shields.io/badge/license-GPLv2-blue.svg?style=flat-square)](https://raw.githubusercontent.com/crypta-eve/seat-squad-sync/master/LICENSE)

## Usage
This plugin provides a very simple yet powerful functionality that allows syncing squad members to role affiliations.

This allows for squads to be created which act as for example a recruitment squad. People who want to apply to corp join the squad. This plugin will then sync the character to be a part of the affiliations of the linked recruitment role.


### NB

At the present time there is a need to configure the `squadsync:sync` job to run on a schedule as the sync is not maintained automatically at this point.

## TODO

- [x] refresh syncs on command (scheduled and manual)
- [] set up observer to automatically sync users on squad events
- [] implement ability to prevent the squad role from being the target role

## Quick Installation
### Docker Install

Open the .env file (which is most probably at /opt/seat-docker/.env) and edit the SEAT_PLUGINS variable to include the package. 

```
# SeAT Plugins
# This is a list of the all of the third party plugins that you
# would like to install as part of SeAT. Package names should be
# comma separated if multiple packages should be installed.
SEAT_PLUGINS=cryptaeve/seat-squad-sync
```

Save your .env file and run docker-compose up -d to restart the stack with the new plugins as part of it. Depending on how many other plugins you also may have, this could take a while to complete.

You can monitor the installation process by running:

docker-compose logs --tail 5 -f seat-app

### Blade Install

In your seat directory (By default:  /var/www/seat), type the following:

```
php artisan down
composer require cryptaeve/seat-squad-sync

php artisan vendor:publish --force --all
php artisan migrate

php artisan up
```

And now, when you log into 'Seat', you should see a 'Squad Sync' link on the left.




