
<tr>
    <td><?= $supervisor['id'] ?></td>
    <td><?= $supervisor['name'] ?></td>
    <td><?= $supervisor['username'] ?></td>
    <td>
        <form action="deletesup" method="post">
            <input type="hidden" name="supId" value="<?= $supervisor['id'] ?>">
            <button type="submit" class="btn-all" <?= ($supervisor['admin'] == 1) ? 'disabled' : '' ?>><i class="bi bi-trash"></i></button>
        </form>
    </td>
    <td>
        <form action="editsup" method="post">
            <input type="hidden" name="name" value="<?= $supervisor['name'] ?>">
            <button type="submit" class="btn-all" <?= ($supervisor['admin'] == 1) ? 'disabled' : '' ?>><i class="bi bi-pencil"></i></button>
        </form>
    </td>
</tr>