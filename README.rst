mwext-mejs
==========

Mediawiki extension to use MediaElement.js media player.

Installation
------------

Install the extension as usual for mediawiki:

- Copy this project to a subfolder named ``mejs`` in the extension
  folder of your mediawiki setup.
- Add a line to your ``LocalSettings.php``, e.g. at the eng::

    'wfLoadExtension('mejs');

- Temporary: Manually download the MediaElement player zip file from
  http://mediaelementjs.com and put the files from the contained
  ``build`` folder to the ``player`` subfolder of the extension. As
  soon as it's clarified that I can redistribute the MediaElement
  player, this step will be removed.
    
- Go to the `Special:Version` page of your Mediawiki to verify the
  mejs extension is loaded.

  
Usage
-----

Use the video tag in any wiki page as follows::

  <video width="640" height="480">http://myhost/myfile.mp4<video>


