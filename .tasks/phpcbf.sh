#!/bin/bash

# PHP CodeSniffer Beautifier

phpcbf --config-set colors 1 >> /dev/null
phpcbf --config-set show_progress 1 >> /dev/null
phpcbf --config-set show_warnings 1 >> /dev/null
phpcbf wp-content/themes/fictional-university-theme/* -n --runtime-set ignore_warnings_on_exit true --standard=./.tasks/.rules/phpcs.xml
phpcbf wp-content/mu-plugins/* -n --runtime-set ignore_warnings_on_exit true --standard=./.tasks/.rules/phpcs.xml
