# Slim with {{mustache}} and SB-Admin bootstrap
From: 

https://startbootstrap.com/template-overviews/sb-admin/

Basic template for coding a dashboard in php.

## Usage

Create a folder named output (the files are going to be stored there) at the root level of the project.

After doing:
```
composer install
```
you can test it using:
```
php -S localhost:8180
```
For sure you can use your favorite port :)

When you heads to 
```
http://localhost:8180/app
```
it is going to interact with your:

```
kubectl config current-context
```

It is on my roadmap to build a docker image to run it just mounting your .kube/config


![alt text](http://www.wtfpl.net/wp-content/uploads/2012/12/wtfpl-badge-4.png "Licence logo")

