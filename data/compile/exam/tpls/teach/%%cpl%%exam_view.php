<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>在线考试系统</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" type="text/css" href="app/core/styles/css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="app/core/styles/css/datetimepicker.css" />
	<link rel="stylesheet" type="text/css" href="app/core/styles/css/jquery-ui.min.css" />
	<link rel="stylesheet" type="text/css" href="app/core/styles/css/peskin.css" />
	<!--[if lt IE 9]>
	<script src="app/core/styles/js/html5shiv.min.js"></script>
	<script src="app/core/styles/js/respond.min.js"></script>
	<![endif]-->
	<script src="app/core/styles/js/jquery.min.js"></script>
	<script src="app/core/styles/js/jquery.json.js"></script>
	<script src="app/core/styles/js/jquery-ui.min.js"></script>
	<script src="app/core/styles/js/bootstrap.min.js"></script>
	<script src="app/core/styles/js/bootstrap-datetimepicker.js"></script>

	<script src="app/core/styles/js/all.fine-uploader.min.js"></script>

	<script src="app/core/styles/js/ckeditor/ckeditor.js"></script>
	<script src="app/core/styles/js/plugin.js"></script>
	<script src="app/exam/styles/js/plugin.js"></script>
</head>
<body data-spy="scroll" data-target="#myScrollspy">
<div class="container-fluid" id="questioncontent">
	<div class="row-fluid">
		<div class="main box">
			<div class="col-xs-3" id="questionbar">
				<dl class="clear" style="width:270px;" data-spy="affix" data-offset-top="235">
					<dt class="float_l"><h4>&nbsp;</h4></dt>
					<ul class="nav nav-tabs" role="tablist">
						<?php $oid = 0; ?>
						<?php $qid = 0;
 foreach($this->tpl_var['sessionvars']['examsessionsetting']['examsetting']['questypelite'] as $key => $lite){ 
 $qid++; ?>
						<?php if($lite){ ?>
						<?php $quest = $key; ?>
						<?php if($this->tpl_var['sessionvars']['examsessionquestion']['questions'][$quest] || $this->tpl_var['sessionvars']['examsessionquestion']['questionrows'][$quest]){ ?>
						<?php $oid++; ?>
						<li role="presentation"<?php if($qid == 1){ ?> class="active"<?php } ?>><a href="#qt_<?php echo $quest; ?>" aria-controls="home" role="tab" data-toggle="tab"><?php echo $this->tpl_var['ols'][$oid]; ?></a></li>
						<?php } ?>
						<?php } ?>
						<?php } ?>
					</ul>
					<div class="tab-content" style="margin-top:5px;" id="questionindex">
						<?php $oid = 0; ?>
						<?php $qid = 0;
 foreach($this->tpl_var['sessionvars']['examsessionsetting']['examsetting']['questypelite'] as $key => $lite){ 
 $qid++; ?>
						<?php if($lite){ ?>
						<?php $quest = $key; ?>
						<?php if($this->tpl_var['sessionvars']['examsessionquestion']['questions'][$quest] || $this->tpl_var['sessionvars']['examsessionquestion']['questionrows'][$quest]){ ?>
						<?php $oid++; ?>
						<div role="tabpanel" class="tab-pane tableindex<?php if($qid == 1){ ?> active<?php } ?>" id="qt_<?php echo $quest; ?>">
							<?php $tid = 0; ?>
			                <?php $qnid = 0;
 foreach($this->tpl_var['sessionvars']['examsessionquestion']['questions'][$quest] as $key => $question){ 
 $qnid++; ?>
			                <?php $tid++; ?>
							<a id="sign_<?php echo $question['questionid']; ?>" href="#question_<?php echo $question['questionid']; ?>" class="btn btn-default"><?php echo $tid; ?></a>
							<?php } ?>
							<?php $qrid = 0;
 foreach($this->tpl_var['sessionvars']['examsessionquestion']['questionrows'][$quest] as $key => $questionrow){ 
 $qrid++; ?>
			                <?php $tid++; ?>
			                <?php $did = 0;
 foreach($questionrow['data'] as $key => $data){ 
 $did++; ?>
			                <a id="sign_<?php echo $data['questionid']; ?>" href="#question_<?php echo $data['questionid']; ?>" class="btn btn-default"><?php echo $tid; ?>-<?php echo $did; ?></a>
                			<?php } ?>
                			<?php } ?>
						</div>
						<?php } ?>
						<?php } ?>
						<?php } ?>
					</div>
				</dl>
			</div>
			<div class="col-xs-9 split pull-right" style="padding:0px;position:relative;">
				<div class="scoreArea"><?php echo $this->tpl_var['sessionvars']['examsessionscore']; ?></div>
				<div class="box itembox">
					<h2 class="text-center tt"><?php echo $this->tpl_var['sessionvars']['examsession']; ?></h2>
				</div>
				<?php $oid = 0; ?>
				<?php $qid = 0;
 foreach($this->tpl_var['sessionvars']['examsessionsetting']['examsetting']['questypelite'] as $key => $lite){ 
 $qid++; ?>
				<?php if($lite){ ?>
				<?php $quest = $key; ?>
				<?php if($this->tpl_var['sessionvars']['examsessionquestion']['questions'][$quest] || $this->tpl_var['sessionvars']['examsessionquestion']['questionrows'][$quest]){ ?>
				<?php $oid++; ?>
				<hr />
				<div class="box itembox">
					<blockquote class="questype"><?php echo $this->tpl_var['ols'][$oid]; ?>、<?php echo $this->tpl_var['questype'][$quest]['questype']; ?><?php echo $this->tpl_var['sessionvars']['examsessionsetting']['examsetting']['questype'][$quest]['describe']; ?></blockquote>
				</div>
				<?php $tid = 0; ?>
	            <?php $qnid = 0;
 foreach($this->tpl_var['sessionvars']['examsessionquestion']['questions'][$quest] as $key => $question){ 
 $qnid++; ?>
	            <?php $tid++; ?>
				<div class="box itembox paperexamcontent">
					<h4 class="title">
						第<?php echo $tid; ?>题
						<span class="pull-right">
							<a class="btn btn-primary qicon" onclick="javascript:favorquestion('<?php echo $question['questionid']; ?>');"><i class="glyphicon glyphicon-heart-empty"></i></a>
							<a name="question_<?php echo $question['questionid']; ?>">
							<input id="time_<?php echo $question['questionid']; ?>" type="hidden" name="time[<?php echo $question['questionid']; ?>]"/>
						</span>
					</h4>
					<div class="choice">
						</a><?php echo html_entity_decode($this->ev->stripSlashes($question['question'])); ?>
					</div>
					<?php if(!$this->tpl_var['questype'][$quest]['questsort']){ ?>
					<?php if($question['questionselect'] && $this->tpl_var['questype'][$quest]['questchoice'] != 5){ ?>
					<div class="choice">
	                	<?php echo html_entity_decode($this->ev->stripSlashes($question['questionselect'])); ?>
	                </div>
	                <?php } ?>
	                <?php } ?>
					<div class="decidediv" style="border-left:10px solid #CCCCCC;position:relative;">
	                	<?php if($this->tpl_var['sessionvars']['examsessionscorelist'][$question['questionid']] && $this->tpl_var['sessionvars']['examsessionscorelist'][$question['questionid']] == $this->tpl_var['sessionvars']['examsessionsetting']['examsetting']['questype'][$quest]['score']){ ?><div class="right"></div><?php } else { ?><div class="wrong"></div><?php } ?>
	                	<table class="table table-hover table-bordered">
            				<tr class="info">
	                			<th colspan="2" style="border-top:0px;">本题得分：<?php echo $this->tpl_var['sessionvars']['examsessionscorelist'][$question['questionid']]; ?>分<?php if($this->tpl_var['sessionvars']['examsessiontimelist'][$question['questionid']]){ ?> &nbsp;&nbsp;做题时间：<?php echo date('Y-m-d H:i:s',$this->tpl_var['sessionvars']['examsessiontimelist'][$question['questionid']]); ?><?php } ?></th>
	                		</tr>
	                		<tr>
	                    		<td width="15%">正确答案：</td>
	                    		<td><?php echo html_entity_decode($this->ev->stripSlashes($question['questionanswer'])); ?></td>
	                    	</tr>
	                    	<tr>
	                    		<td>考生答案：</td>
	                        	<td><?php if(is_array($this->tpl_var['sessionvars']['examsessionuseranswer'][$question['questionid']])){ ?><?php echo implode('',$this->tpl_var['sessionvars']['examsessionuseranswer'][$question['questionid']]); ?><?php } else { ?><?php echo html_entity_decode($this->ev->stripSlashes($this->tpl_var['sessionvars']['examsessionuseranswer'][$question['questionid']])); ?><?php } ?></td>
	                    	</tr>
	                	</table>
	                </div>
				</div>
				<?php } ?>
				<?php $qrid = 0;
 foreach($this->tpl_var['sessionvars']['examsessionquestion']['questionrows'][$quest] as $key => $questionrow){ 
 $qrid++; ?>
	            <?php $tid++; ?>
				<div class="box itembox paperexamcontent">
					<h4 class="title">第<?php echo $tid; ?>题</h4>
					<div class="choice">
						<?php echo html_entity_decode($this->ev->stripSlashes($questionrow['qrquestion'])); ?>
					</div>
					<?php $did = 0;
 foreach($questionrow['data'] as $key => $data){ 
 $did++; ?>
	                <?php $qcid++; ?>
	                <blockquote style="background:#FFFFFF;border-right:1px solid #CCCCCC;border-top:1px solid #CCCCCC;border-bottom:1px solid #CCCCCC;">
					<h4 class="title">
						第<?php echo $did; ?>题
						<span class="pull-right">
							<a class="btn btn-primary qicon" onclick="javascript:favorquestion('<?php echo $data['questionid']; ?>');"><i class="glyphicon glyphicon-heart-empty"></i></a>
							<a name="question_<?php echo $data['questionid']; ?>"></a>
							<input id="time_<?php echo $data['questionid']; ?>" type="hidden" name="time[<?php echo $data['questionid']; ?>]"/>
						</span>
					</h4>
					<div class="choice">
						<?php echo html_entity_decode($this->ev->stripSlashes($data['question'])); ?>
					</div>
					<?php if(!$this->tpl_var['questype'][$quest]['questsort']){ ?>
					<?php if($data['questionselect'] && $this->tpl_var['questype'][$quest]['questchoice'] != 5){ ?>
					<div class="choice">
	                	<?php echo html_entity_decode($this->ev->stripSlashes($data['questionselect'])); ?>
	                </div>
	                <?php } ?>
	                <?php } ?>
					<div class="decidediv" style="border-left:10px solid #EDEDED;position:relative;">
	                	<?php if($this->tpl_var['sessionvars']['examsessionscorelist'][$data['questionid']] && $this->tpl_var['sessionvars']['examsessionscorelist'][$data['questionid']] == $this->tpl_var['sessionvars']['examsessionsetting']['examsetting']['questype'][$quest]['score']){ ?><div class="right"></div><?php } else { ?><div class="wrong"></div><?php } ?>
	                	<table class="table table-hover table-bordered">
            				<tr class="info">
	                			<th colspan="2" style="border-top:0px;">本题得分：<?php echo $this->tpl_var['sessionvars']['examsessionscorelist'][$data['questionid']]; ?>分<?php if($this->tpl_var['sessionvars']['examsessiontimelist'][$data['questionid']]){ ?> &nbsp;&nbsp;做题时间：<?php echo date('Y-m-d H:i:s',$this->tpl_var['sessionvars']['examsessiontimelist'][$data['questionid']]); ?><?php } ?></th>
	                		</tr>
	                		<tr>
	                    		<td width="15%">正确答案：</td>
	                    		<td><?php echo html_entity_decode($this->ev->stripSlashes($data['questionanswer'])); ?></td>
	                    	</tr>
	                    	<tr>
	                    		<td>考生答案：</td>
	                        	<td><?php if(is_array($this->tpl_var['sessionvars']['examsessionuseranswer'][$data['questionid']])){ ?><?php echo implode('',$this->tpl_var['sessionvars']['examsessionuseranswer'][$data['questionid']]); ?><?php } else { ?><?php echo html_entity_decode($this->ev->stripSlashes($this->tpl_var['sessionvars']['examsessionuseranswer'][$data['questionid']])); ?><?php } ?></td>
	                    	</tr>
	                	</table>
	                </div>
					</blockquote>
					<?php } ?>
				</div>
				<?php } ?>
				<?php } ?>
				<?php } ?>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
</body>
</html>