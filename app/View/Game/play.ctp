<div style="float: left;">
    <p style="font-size: 14pt; margin-top: 210px;" align="right">Задача 1</p>
    <p style="font-size: 14pt;">Задача 2</p>
    <p style="font-size: 14pt;">Задача 3</p>
    <p style="font-size: 14pt;">Задача 4</p>
    <p style="font-size: 14pt;">Задача 5</p>
</div>
<div class="body" style="margin: 100px 0px 100px 250px;">
		<div class="page">
            <div class="label"><p>Новый проект</p></div>
				<div class="content">
					<div class="game-wrapper">
					<div class="top">
						<div class="top-left">
						</div>
						<div class="top-middle">
							<p id="state">Проект не запущен</p>
						</div>
						<div class="top-right">
							<p class="counter">Бюджет: 0$</p>
							<p class="counter">Расходы: 0$</p>
						</div>
					</div>
					<div class="field">
						<div class="lead" style="margin-left:0px;"></div>
						<div class="taskbar" style="width:100px; margin-left:0px;">
							<div class="progress" style="width:0px;"></div>
						</div>
						<div class="taskbar" style="width:100px; margin-left:0px;">
							<div class="progress" style="width:0px;"></div>
						</div>
						<div class="taskbar" style="width:100px; margin-left:0px;">
							<div class="progress" style="width:0px;"></div>
						</div>
						<div class="taskbar" style="width:100px; margin-left:0px;">
							<div class="progress" style="width:0px;"></div>
						</div>
						<div class="taskbar" style="width:100px; margin-left:0px;">
							<div class="progress" style="width:0px;"></div>
						</div>
					</div>
					<div class="side">
						<form>
							<select size=1 id="sel1">
								<option value="Mia">Mia</option>
								<option value="Jack">Jack</option>
								<option value="Kate">Kate</option>
								<option value="William">William</option>
							</select>
							<br>
							<select size=1 id="sel2">
								<option value="Mia">Mia</option>
								<option value="Jack">Jack</option>
								<option value="Kate">Kate</option>
								<option value="William">William</option>
							</select>
							<br>
							<select size=1 id="sel3">
								<option value="Mia">Mia</option>
								<option value="Jack">Jack</option>
								<option value="Kate">Kate</option>
								<option value="William">William</option>
							</select>
							<br>
							<select size=1 id="sel4">
								<option value="Mia">Mia</option>
								<option value="Jack">Jack</option>
								<option value="Kate">Kate</option>
								<option value="William">William</option>
							</select>
							<br>
							<select size=1 id="sel5">
								<option value="Mia">Mia</option>
								<option value="Jack">Jack</option>
								<option value="Kate">Kate</option>
								<option value="William">William</option>
							</select>
							<br><br>
							<div class="button-game" onclick="Start()">Начать</div>
						</form>
					</div>
				</div>
			</div>
		</div>
</div>
<?php echo $this->Html->script('gamerules'); ?>