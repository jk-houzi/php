<?php $this->_compileInclude('header'); ?>
<body>
<?php $this->_compileInclude('nav'); ?>
<div class="container-fluid">
	<div class="row-fluid">
		<div class="main">
			<div class="box itembox" style="margin-bottom:0px;">
				<div class="col-xs-12">
					<ol class="breadcrumb">
						<li><a href="index.php">首页</a></li>
						<li class="active">搜索</li>
					</ol>
				</div>
			</div>
			<?php $cid = 0;
 foreach($this->tpl_var['contents']['data'] as $key => $content){ 
 $cid++; ?>
			<div class="box itembox" style="padding-top:20px;">
				<div class="col-xs-3">
					<a href="index.php?content-app-content&contentid=<?php echo $content['contentid']; ?>" class="thumbnail pull-left">
						<img src="<?php echo $content['contentthumb']; ?>" alt="" width="100%">
					</a>
				</div>
				<div class="col-xs-9">
					<a href="index.php?content-app-content&contentid=<?php echo $content['contentid']; ?>"><h4 class="title"><?php echo $content['contenttitle']; ?></h4></a>
					<p><?php echo $content['contentdescribe']; ?></p>
					<hr/>
					<p>
						<span class="pull-right">
							<a href=""><span class="glyphicon glyphicon-time"></span> <span><?php echo date('Y-m-d H:i:s',$content['contentinputtime']); ?></span></a>&nbsp;&nbsp;
							<a href=""><span class="glyphicon glyphicon-heart"></span> <span>1026</span></a>
						</span>
					</p>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
</div>
<?php $this->_compileInclude('footer'); ?>
</body>
</html>