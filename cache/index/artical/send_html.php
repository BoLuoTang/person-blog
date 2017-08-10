<html>
	<head>
		<meta charset='utf-8'>
		<link rel="stylesheet" href="public/editor/css/editormd.css" />
		<script src="public/editor/js/jquery.min.js"></script>
		<script src="public/editor/editormd.min.js"></script>
		<script type="text/javascript">
			$(function() {
				testEditor = editormd("test-editormd", {
						width   : "50%",
						height  : 300,
						syncScrolling : "single",
						path    : "public/editor/lib/"
					});

			});
		</script>
	</head>
	<body>
		<form action='index.php?c=artical&a=doSend' method='post'>
			标题:&emsp;&nbsp;<input type='text' name='title'><br /><br />
			<div class="editormd" id="test-editormd">
				<textarea style="display:none;"></textarea>
			</div><br />
			&emsp;&nbsp;<select name="name">
				<option value="1">php</option>
				<option value="2">前端</option>
				<option value="3">技术之外</option>
				<option value="4">随言碎语</option>
			</select>
			&emsp;&nbsp;<input type='submit' value='提交' name='tijiao'>
		</form>
	</body>
</html>