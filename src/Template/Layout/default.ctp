
<!DOCTYPE html>

<!-- Creasitenet -->
<!-- Edouard Boissel -->
<!-- Réalisation de sites internet -->

<!-- 
/***********************************/
Réalisation du site : Edouard Boissel [Creasitenet] 
URL : http://www.creasitenet.com
Contact: creasitenet.com@gmail.com
/***********************************/
-->

<html lang="fr">
<head>
    <?= $this->Html->charset() ?>
	<title>Tchat - CakePHP
        <?= $this->fetch('title') ?>
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Tchat sous CakePHP" />
    <meta name="keywords" content="Tchat" />    
    <?= $this->Html->meta('icon') ?>
    
    <!-- CSS -->
    <!-- Bootstrap  -->
    <?= $this->Html->css('../plugins/bootstrap/css/bootstrap.min.css') ?>  
    
    <!-- Cake
    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>
    -->
     
    <!-- Plugins -->
    <?= $this->Html->css('../plugins/font-awesome/css/font-awesome.min') ?>  
    <?= $this->Html->css('../plugins/growl/jquery.growl') ?>  
  
	    
	<!-- Customs -->
    <?= $this->Html->css('app.css') ?>
    
    <!-- JS -->
    <?= $this->Html->script('../plugins/jquery/jquery.min') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
      
</head>

<body>
	
	<!-- Wrapper-->
    <div class="wrapper">	
       		
	    <a href="https://github.com/creasitenet/tchat_cakephp_fr" target="_blank">
	        <img style="position: absolute; top: 0; right: 0; border: 0; z-index: 1;" src="https://camo.githubusercontent.com/365986a132ccd6a44c23a9169022c0b5c890c387/68747470733a2f2f73332e616d617a6f6e6177732e636f6d2f6769746875622f726962626f6e732f666f726b6d655f72696768745f7265645f6161303030302e706e67" alt="Fork me on GitHub" data-canonical-src="https://s3.amazonaws.com/github/ribbons/forkme_right_red_aa0000.png">
	    </a>
               	           	
		<div class="container content">
			<div class="row">
				<div class="col-sm-8 col-sm-offset-2">
		            <?= $this->Flash->render() ?>
		            <?= $this->Flash->render('auth') ?>
	                <?= $this->fetch('content') ?>
	            </div>
	        </div>
	    </div>
    
    </div>
    <!-- // Wrapper-->
        
    <!-- JS -->
    <?= $this->Html->script('../plugins/bootstrap/js/bootstrap.min') ?>
    <?= $this->Html->script('../plugins/growl/jquery.growl') ?>
    <?= $this->Html->script('app') ?>
    
</body>
</html>
