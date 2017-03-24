$ sudo apt-get install subversion  //Install this in server
$ sudo apt-get install openssh-server //Install this in server
$ sudo mkdir -p /svn/repos
$ sudo svnadmin create /svn/repos/<reponame>
$ sudo svnserve -d -r /svn/repos
$ sudo vi /svn/repos/hello/conf/svnserve.conf
    - modify
    - anon-access = none
    - auth-access = write
    - passwod-db = passwd 
$ sudo vi /svn/repos/hello/conf/passwd 
    username = password

$ svn import <yourlocalfoldername> <svn://ipaddress/pathofrepofolder>


https://www/cs.usfca.edu/svn/srollins

$ svn list <svn url site>
$ svn mkdir <svn url site>/<yourfoldername> -m "-m is your commit message"  
$ svn co  <svn url site>/<yourfoldername> 
$ cd <yourfoldername> 
$ mkdir <newfoldername>
$ cd <newfoldername>
//add a file inside the new <newfoldername>
$ cd ..
$ svn add <newfoldername>
$ svn commit -m "-m is your commit message"  
$ svn up
$ svn log 

$ ssh -yourusername <ssh url>
$ rusers -a //to see which specific machine to login
$ ssh <machinenaname> 
$ mkdir <newnewfoldername>
$ cd <newnewfoldername>
$ svn co  <svn url site>/<yourfoldername> 

//to login to server
$ ssh <username>@<url>

//client
$ mkdir <foldername>
$ cd <foldername>
$ mkdir trunk //HEAD of the  code 
$ mkdir branches //comes from the trunk
$ mkdir tags //matured branches
$ svn import <yourlocalfoldername> <svn://ipaddress/pathofrepofolder> //push to server
$ svn co  <svn url site>/<yourfoldername> 
$ cd <yourfoldername> 
    - modify trunk 
trunk $ svn add <newfoldername || filename>
trunk $ svn commit -m "-m is your commit message"  //code push to the server
trunk $ svn copy  <svn url site>/<yourfoldername>/trunk <svn url site>/<yourfoldername>/branches/<folderbranchname>
trunk $ cd branches
branches $ svn up //pulls from the server
branches $ ls //you should see the <folderbranchname>
    - modify branches
branches $ 


 
