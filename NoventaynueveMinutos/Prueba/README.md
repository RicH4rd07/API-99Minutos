# Mage2 Module NoventaynueveMinutos Prueba

    ``noventaynueveminutos/module-prueba``

 - [Main Functionalities](#markdown-header-main-functionalities)
 - [Installation](#markdown-header-installation)
 - [Configuration](#markdown-header-configuration)
 - [Specifications](#markdown-header-specifications)
 - [Attributes](#markdown-header-attributes)


## Main Functionalities
NoventaynueveMinutos

## Installation
\* = in production please use the `--keep-generated` option

### Type 1: Zip file

 - Unzip the zip file in `app/code/NoventaynueveMinutos`
 - Enable the module by running `php bin/magento module:enable NoventaynueveMinutos_Prueba`
 - Apply database updates by running `php bin/magento setup:upgrade`\*
 - Flush the cache by running `php bin/magento cache:flush`

### Type 2: Composer

 - Make the module available in a composer repository for example:
    - private repository `repo.magento.com`
    - public repository `packagist.org`
    - public github repository as vcs
 - Add the composer repository to the configuration by running `composer config repositories.repo.magento.com composer https://repo.magento.com/`
 - Install the module composer by running `composer require noventaynueveminutos/module-prueba`
 - enable the module by running `php bin/magento module:enable NoventaynueveMinutos_Prueba`
 - apply database updates by running `php bin/magento setup:upgrade`\*
 - Flush the cache by running `php bin/magento cache:flush`


## Configuration

 - NoventaynueveMinutos - carriers/noventaynueveminutos/*


## Specifications

 - API Endpoint
	- GET - NoventaynueveMinutos\Prueba\Api\Prueba_apiManagementInterface > NoventaynueveMinutos\Prueba\Model\Prueba_apiManagement

 - Shipping Method
	- noventaynueveminutos


## Attributes



