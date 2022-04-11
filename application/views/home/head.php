<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <?php foreach ($konten_detail as $row) {
    if ($row->id_konten == 2) { ?>
      <meta name="description" content="<?= $row->isi ?>">
  <?php }
  } ?>
  <?php foreach ($konten_detail as $row) {
    if ($row->id_konten == 8) { ?>
      <meta name="keywords" content="<?= $row->isi ?>">
  <?php }
  } ?>
  <meta name="author" content="Amalia Safira">
  <meta name="generator" content="Jekyll v4.0.1">
  <?php foreach ($konten_detail as $row) {
    if ($row->id_konten == 9) { ?>
      <link rel="icon" href="<?= base_url() ?>assets/img/konten/<?= $row->isi ?>">
  <?php }
  } ?>
  <?php foreach ($konten_detail as $row) {
    if ($row->id_konten == 1) { ?>
      <title><?= $row->isi ?></title>
  <?php }
  } ?>

  <!-- Bootstrap core CSS -->
  <link href="<?= base_url() ?>assets/file/dist/css/bootstrap.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/file/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!-- <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/blog/"> -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Bootstrap core CSS -->
  <link href="<?= base_url() ?>assets/file/dist/css/bootstrap.css" rel="stylesheet">


  <!-- Custom styles for this template -->
  <!-- <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet"> -->
  <link href="<?= base_url() ?>assets/cover.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/edible.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <!-- <link href="<?= base_url() ?>assets/blog.css" rel="stylesheet"> -->
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-176798522-1"></script>
  <script src="<?= base_url() ?>assets/file/dist/js/jquery-3.5.1.min.js"></script>
  <link rel="stylesheet" href="<?= base_url(); ?>assets/summernote/summernote.css" />
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Oswald" />

</head>