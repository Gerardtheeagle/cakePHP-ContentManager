<!-- Fichier : templates/Articles/edit.php -->
<?php echo $this->Html->link('◄ Retour', ['action' => 'index'], ['class' => 'btn btn-primary ft-1' ]) ?>
<h1>Modifier un article</h1>
<?php
    echo $this->Form->create($article);
    // echo $this->Form->control('user_id', ['type' => 'hidden']); pas besoin vu qu'on a installer le système d'autorization
    echo $this->Form->control('title');
    echo $this->Form->control('body', ['rows' => '3']);
    echo $this->Form->control('tags._ids', ['options' => $tags]);
    echo $this->Form->control('tag_string', ['type' => 'text']);
    echo $this->Form->button(__('Sauvegarder l\'article'));
    echo $this->Form->end();
?>