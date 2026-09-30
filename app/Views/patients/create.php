<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sahana Health - Add Patient</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
<div class="container" style="max-width: 500px;">
 
    <h2>Add New Patient</h2>
 
    <?php if (session()->getFlashdata('errors')): ?>
        <div class="alert alert-danger">
            <ul class="mb-0">
                <?php foreach (session()->getFlashdata('errors') as $error): ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
 
    <form action="/patients/store" method="post">
        <?= csrf_field() ?>
 
        <div class="mb-3">
            <label class="form-label">Full Name</label>
            <input type="text" name="name" class="form-control" value="<?= old('name') ?>">
        </div>
 
        <div class="mb-3">
            <label class="form-label">NIC Number</label>
            <input type="text" name="nic" class="form-control" value="<?= old('nic') ?>">
        </div>
 
        <div class="mb-3">
            <label class="form-label">Phone Number</label>
            <input type="text" name="phone" class="form-control" value="<?= old('phone') ?>">
        </div>
 
        <button type="submit" class="btn btn-success">Save Patient</button>
        <a href="/patients" class="btn btn-secondary">Cancel</a>
    </form>
 
</div>
</body>
</html>