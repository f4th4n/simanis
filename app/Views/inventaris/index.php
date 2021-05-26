<div>
	<a href="/admin/inventaris/create/">Tambah</a>
</div>
<table>
	<thead>
		<tr>
			<th>test</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<?php foreach ($rows_inventaris as $row): ?>
				<td><?= $row['id'] ?></td>
				<td><?= $row['no_inventaris'] ?></td>
				<td><?= $row['nama'] ?></td>
			<?php endforeach; ?>
		</tr>
	</tbody>
</table>
