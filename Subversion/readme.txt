SSH to the server
$ sudo apt-get install subversion  //Install this in server
$ sudo apt-get install openssh-server //Install this in server
$ sudo mkdir -p /svn/repos //create a folder in the server
$ sudo svnadmin create /svn/repos/<reponame> //creating a repository in the server 
$ sudo vi /svn/repos/hello/conf/svnserve.conf     //edit the svn server configuration
    - modify
    - anon-access = none
    - auth-access = write
    - passwod-db = passwd 
$ sudo vi /svn/repos/hello/conf/passwd 
    username = password
$ sudo svnserve -d -r /svn/repos //start the server


$ svn import <yourlocalfoldername> <svn://ipaddress/pathofrepofolder> //initial push the file from local to the server 

$ pidof svnserve //get the process id of the svn
$ sudo kill -9 <svinpid> //stops the current svn running



https://www.cs.usfca.edu/svn/srollins

$ svn list <svn url site>
$ svn mkdir <svn url site>/<yourfoldername> -m "-m is your commit message"  
$ svn co  <svn url site>/<yourfoldername>  //to checkout project from the server
$ cd <yourfoldername>  //go inside your svn folder
//modify your local svn
$ mkdir <newfoldername>
$ cd <newfoldername>
//add a file inside the new <newfoldername>
$ cd ..
$ svn add <newfoldername>
$ svn commit -m "-m is your commit message"   //commit changes to your local svn 
$ svn up //
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
$ cd <yourfoldername/trunk> 
    - modify trunk like add a file 
trunk $ svn add <newfoldername || filename>
trunk $ svn commit -m "-m is your commit message"  //code push to the server

//In the server
$ svn copy  <svn: url site/yourfoldername/trunk> <svn: url site/yourfoldername/branches/foldername>

//client
$ cd branches
branches $ svn up //pulls from the server
branches $ ls //you should see the branches
    - modify branches
branches/specificbranch $ svn commit -m "-m is your commit message"   //commit changes to your local svn 
branches/specificbranch $ svn up //compares the local branch from the server and updates if there's changes
branches/specificbranch $ svn merge ^/trunk //pulls trunk to branch
branches/specificbranch $ svn commit -m "-m is your commit message"  //code push to the server
mainrepo $ svn up //update all folder
trunk $ svn merge --reintegrate ^/branches 
trunk $ svn up 
trunk $ svn commit -m "-m is your commit message"  //code push to the server


 
