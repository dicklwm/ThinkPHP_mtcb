<?php if (!defined('THINK_PATH')) exit(); if(C('LAYOUT_ON')) { echo ''; } ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>提示</title>
<link rel="stylesheet" type="text/css"
	href="/ThinkPHP_mtcb/Public./css/bootstrap.min.css" />
</head>
<body>

	<!-- 模态框（Modal） -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog"
		aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"
						aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="myModalLabel">
						<?php if(isset($message)) { echo '<span class="glyphicon glyphicon-ok" aria-hidden="true" style="color:green">提示</span>'; } else{ echo '<span class="glyphicon glyphicon-remove" aria-hidden="true" style="color:red ">出错</span>'; } ?>
					</h4>
				</div>
				<div class="modal-body">
					<h4>
						<?php if(isset($message)) { echo($message); } else{ echo ($error); } ?>
					</h4>
					<p style="text-align:right">
						页面自动 <a id="href" href="<?php echo($jumpUrl); ?>">跳转</a> 等待时间： <b
							id="wait">
							<?php echo($waitSecond); ?>
						</b>
					</p>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">关闭
					</button>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal -->
	</div>

	<script src="/ThinkPHP_mtcb/Public./js/jquery-1.12.3.min.js"></script>
	<script src="/ThinkPHP_mtcb/Public./js/bootstrap.min.js"></script>

	<script type="text/javascript">
		// 显示模态框 
		var href = document.getElementById('href').href;
		$('#myModal').modal('show');
		//计时
		(function() {
			var wait = document.getElementById('wait');
			var interval = setInterval(function() {
				var time = --wait.innerHTML;
				if (time <= 0) {
					$('#myModal').modal('hide');
					clearInterval(interval);
				}
				;
			}, 1000);
		})();
		//绑定完全对用户隐藏时事件
		$('#myModal').on('hidden.bs.modal', function() {
			location.href = href;
		});
	</script>

</body>
</html>