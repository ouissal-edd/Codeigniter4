<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<h1>Creat post</h1>
<div class='row'>
    <div class="col-12 col-md-8 offset-md-2">
        <form action="/blog/new" method="post">
            <div class="form-group">
                <label for="">Title</label>
                <input type="text" class="form-control" name="post_title">
            </div>

            <div class="form-group">
                <label for="">Content</label>
                <textarea type="text" class="form-control" name="post_content" rows="3"></textarea>
            </div>

            <div class="form-group">
                <button class="btn btn-success btn-sm">Create</button>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>