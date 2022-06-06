<h1>Список пользователей</h1>

<a class="btn btn--add" href="/admin/users/add">Добавить пользователя</a>

<?php if( $users ): ?>

	<table>
		<thead>
			<tr>
				<th>ID</th>
				<th>Имя</th>
				<th>Роль</th>
				<th>Действия</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach( $users as $user ): ?>
			<tr>
				<td><?php echo $user['User']['id'] ?></td>
				<td><a href="/admin/users/edit/<?php echo $user['User']['id'] ?>"><?php echo $user['User']['username'] ?></a></td>
				<td><?php echo $user['User']['role'] ?></td>
				<td>
					<a href="/admin/users/edit/<?php echo $user['User']['id'] ?>">Редактировать</a>
					<?php if( $user['User']['id'] != 1 && $user['User']['role'] != 'admin' ): ?>
						<?php  echo "| " . $this -> Form -> postLink('Удалить', "/admin/users/delete/{$user['User']['id']}", array('confirm' => 'Удалить пользователя?')) ?>
					<?php endif; ?>
				</td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>

<?php endif; ?>