<?php if(!$this->tpl_var['userhash']){ ?>
<?php $this->_compileInclude('header'); ?>
<body>
<?php $this->_compileInclude('nav'); ?>
<div class="container-fluid">
	<div class="row-fluid">
		<div class="main">
			<div class="col-xs-2" style="padding-top:10px;margin-bottom:0px;">
				<?php $this->_compileInclude('menu'); ?>
			</div>
			<div class="col-xs-10" id="datacontent">
<?php } ?>
				<div class="box itembox" style="margin-bottom:0px;border-bottom:1px solid #CCCCCC;">
					<div class="col-xs-12">
						<ol class="breadcrumb">
							<li><a href="index.php?<?php echo $this->tpl_var['_app']; ?>-master"><?php echo $this->tpl_var['apps'][$this->tpl_var['_app']]['appname']; ?></a></li>
							<li><a href="index.php?<?php echo $this->tpl_var['_app']; ?>-master-exams&page=<?php echo $this->tpl_var['page']; ?><?php echo $this->tpl_var['u']; ?>">试卷管理</a></li>
							<li class="active">随机组卷</li>
						</ol>
					</div>
				</div>
				<div class="box itembox" style="padding-top:10px;margin-bottom:0px;">
					<h4 class="title" style="padding:10px;">
						随机组卷
						<a class="btn btn-primary pull-right" href="index.php?<?php echo $this->tpl_var['_app']; ?>-master-exams&page=<?php echo $this->tpl_var['page']; ?><?php echo $this->tpl_var['u']; ?>">试卷管理</a>
					</h4>
			        <form action="index.php?exam-master-exams-autopage" method="post" class="form-horizontal">
						<div class="form-group">
							<label class="control-label col-sm-2" for="content">试卷名称：</label>
					  		<div class="col-sm-4">
					  			<input class="form-control" type="text" name="args[exam]" value="" needle="needle" msg="您必须为该试卷输入一个名称"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2">评卷方式</label>
							<div class="col-sm-9">
								<label class="radio-inline">
									<input name="args[examdecide]" type="radio" value="1"/>教师评卷
								</label>
								<label class="radio-inline">
									<input name="args[examdecide]" type="radio" value="0" checked/>学生自评
								</label>
								<span class="help-block">教师评卷时有主观题则需要教师在后台评分后才能显示分数，无主观题自动显示分数。</span>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2" for="content">考试科目：</label>
						  	<div class="col-sm-4">
							  	<select class="form-control combox" needle="needle" min="1" name="args[examsubject]" msg="请选择科目" onchange="javascript:loadsubjectsetting(this);">
								  	<option value="">请选择科目</option>
								  	<?php $sid = 0;
 foreach($this->tpl_var['subjects'] as $key => $subject){ 
 $sid++; ?>
								  	<option value="<?php echo $subject['subjectid']; ?>"><?php echo $subject['subject']; ?></option>
								  	<?php } ?>
							  	</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2" for="content">考试时间：</label>
					  		<div class="col-sm-9 form-inline">
					  			<input class="form-control" type="text" name="args[examsetting][examtime]" value="60" size="4" needle="needle" class="inline"/> 分钟
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2" for="content">来源：</label>
					  		<div class="col-sm-4">
					  			<input class="form-control" type="text" name="args[examsetting][comfrom]" value="" size="4"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2" for="content">试卷总分：</label>
					  		<div class="col-sm-4">
					  			<input class="form-control" type="text" name="args[examsetting][score]" value="" size="4" needle="needle" msg="你要为本考卷设置总分" datatype="number"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2" for="content">及格线：</label>
					  		<div class="col-sm-4">
					  			<input class="form-control" type="text" name="args[examsetting][passscore]" value="" size="4" needle="needle" msg="你要为本考卷设置一个及格分数线" datatype="number"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2">题型排序</label>
							<div class="col-sm-9">
								<div class="sortable btn-group">
									<?php $qid = 0;
 foreach($this->tpl_var['questypes'] as $key => $questype){ 
 $qid++; ?>
									<a class="btn btn-primary questpanel panel_<?php echo $questype['questid']; ?>"><?php echo $questype['questype']; ?><input type="hidden" name="args[examsetting][questypelite][<?php echo $questype['questid']; ?>]" class="questypepanelinput" id="panel_<?php echo $questype['questid']; ?>" value="1"/></a>
									<?php } ?>
								</div>
								<span class="help-block">拖拽进行题型排序</span>
							</div>
						</div>
						<div class="form-group">
					        <label class="control-label col-sm-2">题量配比模式：</label>
				          	<div class="col-sm-9">
								<label class="radio-inline">
					          		<input type="radio" class="form-control" name="args[examsetting][scalemodel]" value="1" onchange="javascript:$('#modeplane').html($('#sptype').html());"/> 开启
					          	</label>
					          	<label class="radio-inline">
					          		<input type="radio" class="form-control" name="args[examsetting][scalemodel]" value="0" onchange="javascript:$('#modeplane').html($('#normaltype').html());" checked/> 关闭
					          	</label>
					       </div>
					    </div>
					    <div id="modeplane">
					    	<?php $qid = 0;
 foreach($this->tpl_var['questypes'] as $key => $questype){ 
 $qid++; ?>
							<div class="form-group questpanel panel_<?php echo $questype['questid']; ?>">
								<label class="control-label col-sm-2" for="content"><?php echo $questype['questype']; ?>：</label>
								<div class="col-sm-9 form-inline">
									<span class="info">共&nbsp;</span>
									<input id="iselectallnumber_<?php echo $questype['questid']; ?>" type="text" class="form-control" needle="needle" name="args[examsetting][questype][<?php echo $questype['questid']; ?>][number]" value="0" size="1" msg="您必须填写总题数"/>
									<span class="info">&nbsp;题，每题&nbsp;</span><input class="form-control" needle="needle" type="text" name="args[examsetting][questype][<?php echo $questype['questid']; ?>][score]" value="0" size="1" msg="您必须填写每题的分值"/>
									<span class="info">&nbsp;分，描述&nbsp;</span><input class="form-control" type="text" name="args[examsetting][questype][<?php echo $questype['questid']; ?>][describe]" value="" size="10"/>
									<span class="info">&nbsp;易&nbsp;</span><input class="form-control" type="text" name="args[examsetting][questype][<?php echo $questype['questid']; ?>][easynumber]" value="0" size="1" msg="您需要填写简单题的数量，最小为0"/>
			  						<span class="info">&nbsp;中&nbsp;</span><input class="form-control" type="text" needle="needle" name="args[examsetting][questype][<?php echo $questype['questid']; ?>][middlenumber]" value="0" size="1" msg="您需要填写中等难度题的数量，最小为0"/>
			  						<span class="info">&nbsp;难&nbsp;</span><input class="form-control" type="text" needle="needle" name="args[examsetting][questype][<?php echo $questype['questid']; ?>][hardnumber]" value="0" size="1" datatype="number" msg="您需要填写难题的数量，最小为0"/>
								</div>
							</div>
							<?php } ?>
					    </div>
						<div class="form-group">
							<label class="control-label col-sm-2"></label>
							<div class="col-sm-9">
								<button class="btn btn-primary" type="submit">提交</button>
								<input type="hidden" name="submitsetting" value="1"/>
							</div>
						</div>
					</form>
					<div id="sptype" class="hide">
					    <div class="form-group">
					        <label class="control-label col-sm-2">题量配比：</label>
				          	<div class="col-sm-9">
					          	<label class="radio inline">题量配比模式关闭时，此设置不生效。题量配比操作繁琐，请尽量熟悉后再行操作。</label>
					       </div>
					    </div>
					    <?php $qid = 0;
 foreach($this->tpl_var['questypes'] as $key => $questype){ 
 $qid++; ?>
						<div class="form-group questpanel panel_<?php echo $questype['questid']; ?>">
							<label class="control-label col-sm-2" for="content"><?php echo $questype['questype']; ?>：</label>
							<div class="col-sm-9 form-inline">
								<span class="info">共&nbsp;</span>
								<input id="iselectallnumber_<?php echo $questype['questid']; ?>" type="text" class="form-control" needle="needle" name="args[examsetting][questype][<?php echo $questype['questid']; ?>][number]" value="0" size="2" msg="您必须填写总题数"/>
								<span class="info">&nbsp;题，每题&nbsp;</span><input class="form-control" needle="needle" type="text" name="args[examsetting][questype][<?php echo $questype['questid']; ?>][score]" value="0" size="2" msg="您必须填写每题的分值"/>
								<span class="info">&nbsp;分，描述&nbsp;</span><input class="form-control" type="text" name="args[examsetting][questype][<?php echo $questype['questid']; ?>][describe]" value="" size="12"/>
							</div>
						</div>
						<div class="form-group questpanel panel_<?php echo $questype['questid']; ?>">
							<label class="control-label col-sm-2" for="content">配比率：</label>
							<div class="col-sm-9">
								<textarea class="form-control" rows="7" cols="4" name="args[examsetting][examscale][<?php echo $questype['questid']; ?>]"></textarea>
							</div>
						</div>
						<?php } ?>
					</div>
					<div id="normaltype" class="hide">
						<?php $qid = 0;
 foreach($this->tpl_var['questypes'] as $key => $questype){ 
 $qid++; ?>
						<div class="form-group questpanel panel_<?php echo $questype['questid']; ?>">
							<label class="control-label col-sm-2" for="content"><?php echo $questype['questype']; ?>：</label>
							<div class="col-sm-9 form-inline">
								<span class="info">共&nbsp;</span>
								<input id="iselectallnumber_<?php echo $questype['questid']; ?>" type="text" class="form-control" needle="needle" name="args[examsetting][questype][<?php echo $questype['questid']; ?>][number]" value="0" size="1" msg="您必须填写总题数"/>
								<span class="info">&nbsp;题，每题&nbsp;</span><input class="form-control" needle="needle" type="text" name="args[examsetting][questype][<?php echo $questype['questid']; ?>][score]" value="0" size="1" msg="您必须填写每题的分值"/>
								<span class="info">&nbsp;分，描述&nbsp;</span><input class="form-control" type="text" name="args[examsetting][questype][<?php echo $questype['questid']; ?>][describe]" value="" size="10"/>
								<span class="info">&nbsp;易&nbsp;</span><input class="form-control" type="text" name="args[examsetting][questype][<?php echo $questype['questid']; ?>][easynumber]" value="0" size="1" msg="您需要填写简单题的数量，最小为0"/>
		  						<span class="info">&nbsp;中&nbsp;</span><input class="form-control" type="text" needle="needle" name="args[examsetting][questype][<?php echo $questype['questid']; ?>][middlenumber]" value="0" size="1" msg="您需要填写中等难度题的数量，最小为0"/>
		  						<span class="info">&nbsp;难&nbsp;</span><input class="form-control" type="text" needle="needle" name="args[examsetting][questype][<?php echo $questype['questid']; ?>][hardnumber]" value="0" size="1" datatype="number" msg="您需要填写难题的数量，最小为0"/>
							</div>
						</div>
						<?php } ?>
					</div>
				</div>
			</div>
<?php if(!$this->tpl_var['userhash']){ ?>
		</div>
	</div>
</div>
<script>
function loadsubjectsetting(obj)
{
	$.getJSON('index.php?exam-master-basic-getsubjectquestype&subjectid='+$(obj).val()+'&'+Math.random(),function(data){$('.questpanel').hide();$('.questypepanelinput').val('0');for(x in data){$('.panel_'+data[x]).show();$('#panel_'+data[x]).val('1');}});
}
</script>
<?php $this->_compileInclude('footer'); ?>
</body>
</html>
<?php } ?>