
    <!-- Users -->
    <?php if (isset($users)): ?> 
    	<?php if(!empty($users)): ?>
			<ul class="users">
			<?php foreach ($users as $u): ?>
				<li class="username">
					 <span class="status">
					 	<?php echo $this->Html->image($u->is_online_img(), array('width'=>'10px', 'alt'=>'Status')); ?>
					 </span>
					 <?php echo $u->username; ?>
					 <br />
					 <span class="date">
					 	(<?php echo $u->last_login_ago(); ?>)
					 </span>
				</li>
			<?php endforeach; ?>
			</ul>
		<?php endif; ?>
    <?php endif; ?>
    <!-- //Users -->
