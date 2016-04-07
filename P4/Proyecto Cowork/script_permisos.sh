#!/bin/bash
yo=$(logname)
sudo chown -R www-data /var/www/html
sudo chgrp -R $yo /var/www/html
sudo chmod -R 775 /var/www/html
sudo adduser $yo www-data