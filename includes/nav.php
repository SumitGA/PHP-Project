<?php if(($_SESSION['accesslevel']=="1")){ ?>
<div class="wrapper col1">
  <div id="header">
    <div id="logo">
      <h1><a href="index.php"><a href="#"><img src="images/logow.gif" alt="Orchid International College" /></a></h1>
      
    </div>
    </div>
    </div>

<div id="menu">
      <ul>
        <li ><a href="index.php">Home</a></li>
        <li><a href="#">Program</a>
          <ul>
          <li><a href="bim.php">BIM</a></li>
          <li><a href="bsw.php">BSW</a></li>
          <li><a href="bsccsit.php">Bsc. CSIT</a></li>
          
          </ul>
        </li>
        
        <li><a href="gallery.php">Gallery</a> </li>
        <li><a href="contact.php">Contact</a></li> 
        
      <li class="last"><a href="upload_notes.php">Upload Notes</a>
      </ul>
    </div>
    <br class="clear" />
     </div>
    </div>
<?php }else{ ?>
<div class="wrapper col1">
  <div id="header">
    <div id="logo">
      <h1><a href="index.php"><a href="#"><img src="images/logow.gif" alt="Orchid International College" /></a></h1>
      
    </div>
    </div>
    </div>



<div id="menu">
      <ul>
        <li ><a href="index.php">Home</a></li>
        <li><a href="#">Program</a>
          <ul>
          <li><a href="bim.php">BIM</a></li>
          <li><a href="bsw.php">BSW</a></li>
          <li><a href="bsccsit.php">Bsc. CSIT</a></li>
          
          </ul>
        </li>
        
        <li><a href="gallery.php">Gallery</a> </li>
        <li><a href="contact.php">Contact</a></li> 
        
      <li class="last"><a href="apply_online.php">Apply Online</a>
      </ul>
    </div>
    <br class="clear" />

    </div>
    </div>           
          
<?php }?>


       

