# PHP Based Credential Stuffing Lab

## Lab description

Lab uses Argon2ID (correct approach but slow demo), or MD5 (very insecure, but fast demo) for password-based hashing functions.
Hashes are hardcoded in the app, generated using `password_hash` PHP built-in function.

Use [RockYou](https://github.com/danielmiessler/SecLists/blob/master/Passwords/Leaked-Databases/rockyou-75.txt)
leaked password list in the dictonary attack for users `admin` and `user`.

Use [CUPP](https://github.com/Mebus/cupp) for generation of new dictionary for the `JohnMcClain` user;

## Running the lab

### Build local docker image

#### Argon2ID - longer demo

`sudo docker build -t php-cred-stuff:argon2id -f .Dockerfile.Argon2ID .`

#### MD5 - insecure fast demo

`sudo docker build -t php-cred-stuff:md5 -f .Dockerfile.MD5 .`

### Run container from image

`sudo docker run -p 8000:8000 php-cred-stuff:argon2id`

or

`sudo docker run -p 8000:8000 php-cred-stuff:md5`


### Access login form
`http://localhost:8000`

