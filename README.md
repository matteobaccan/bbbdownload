# BigBlueButton downloader
A simply PHP script for Download BigBlueButton Presentation

# How To use

php mirror.php <site> <presentation id>
  
site = site where is installed BigBlueButton
id = presentation ID

example

php mirror.php https://bigblue.foo-bar.com 5abb43d27af53d4f3268874a3a4f22a497bdefa1-1615020094109

# After download

After download you can simply start PHP ad HTTP daemon

php -S 127.0.0.1

and ut this line inside your browser

http://127.0.0.1/playback/presentation/2.0/playback.html?meetingId=<presentation id>
  
for example

http://127.0.0.1/playback/presentation/2.0/playback.html?meetingId=5abb43d27af53d4f3268874a3a4f22a497bdefa1-1615020094109

