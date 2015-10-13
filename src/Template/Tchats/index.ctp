<h2>Tchat - CakePHP 3</h2>

<div class="col-sm-8">
    <br />
    
	<!-- Messages -->
    <div id="tchatmessages">
       <div id="tchat_messages">
		    <?php if(isset($messages)): ?>
		    	<?php if(!empty($messages)): ?>
		        	<?php include_once('_messages.ctp'); ?>
		    	<?php endif; ?>
		    <?php endif; ?>
       </div>
    </div>
    
	<?php if($user): ?>
    <div id="newmessage">
    	<?php echo $this->Form->create(); ?>
    		<div class="input-group"> 
           	<input type="text" class="form-control add" id="text" name="text" placeholder="" autofocus autocomplete="off" />
           	<span class="input-group-btn">
    	        <button type="button" class="btn btn-primary" onclick="ajax_add('tchats/postAjaxAdd',$('#text').val(),'#text')">ENVOYER</button>
           	</span>
           	</div>
        <?php echo $this->Form->end(); ?>
    </div>
	<?php endif; ?>
	<?php if(!$user): ?>
		<?php include_once('_login.ctp'); ?>
	<?php endif; ?>
	<div class="clearfix"></div>
	<br />
	
</div>

<div class="col-sm-4">
	
	<!-- User -->
	<div id="tchatusers">
		<div id="tchat_users">
				<?php if(isset($users)): ?>
				    <?php if(!empty($users)): ?>
				        <?php include_once('_users.ctp'); ?>
				      <?php endif; ?>
				<?php endif; ?>
		</div>
	</div>
	<div id="test">
	</div>
	<?php if($user): ?>
		<br />
		<a href="users/logout" class="btn btn-primary btn-sm btn-block">SE DECONNECTER</a>
	<?php endif; ?>
	
</div>

    