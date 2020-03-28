# Build Image
```
$ sudo docker build -t my-php-app .
```

# Run Container
```
$ sudo docker run -d --name my-running-app my-php-app

ba9f2ada7228.............................
```

# Start Apache Server
```
$ sudo docker exec -it ba9f2ada7228 /bin/bash

root@ba9f2ada7228:/var/www/html# service apache2 start

[....] Starting Apache httpd web server: apache2AHD0318: apache2: Could not reliably determine the server's fully qualified domain name, using 172.17.0.2. Set the 'ServerName' directive globally to suppress this message
. ok 

```

Now, you can access your server on 172.17.0.2