<?php get_header();?>

<h1>VIEW USER HOME</h1>
<br>
<?php
    $router = $args['router'];
    $profile =  $args['profile'];
    $skills = wp_get_object_terms(
        $profile->ID,
        'skill'
    );
    $technologies = $args['technologies'];
    $allSkills = get_terms('skill', array(
        'hide_empty' => false,));
    $allTechnologies = get_terms('technology', array(
        'hide_empty' => false,));
?>
<p>Username :<?php echo $args['currentUser']->data->user_nicename; ?></p>
<p>Email :<?= $args['currentUser']->data->user_email;?></p>
<p>Role :<?= $args['currentUser']->roles[0];?></p>
<br>
<div class="welcome__cta">
    <p><h2>Compétences :</h2>
        <ul>
        <?php foreach ($skills as $skill) : ?>
            <li>
                <?= $skill->name; ?>
            </li>
        <?php endforeach; ?>
        </ul>
    </p>
<br>
    <a href="<?= ""; ?>">ajouter</a>
<br>
    <select name="" id="">
        <?php foreach ($allSkills as $skill) : ?>
            <option value="<?= $skill->term_id; ?>"><?= $skill->name; ?></option>
        <?php endforeach; ?>
    </select>
</div>



<br>
<hr>
<div class="welcome__cta">
    <?php
        $levels = [
            'Débutant', //1
            'Intermédiaire',//2
            'Confirmé',//3
            'Expert',//4
            'Danse avec les stars',//5
        ];?>
    <p><h2>Technologies :</h2>
<br>
        <ul>
        <?php foreach ($technologies as $technology) :
        ?>
            <li>
                <?= $technology['technology']->name; ?> (niveau : <?= $levels[$technology['level']]; ?>)
                <a href="<?= $router->generate('test-model-delete'); ?>?termid=<?= $technology['technology']->term_id; ?>"><button> - </button></a>
            </li>
        <?php endforeach; ?>
        </ul>
    </p>
<hr>
<form action="<?= $router->generate('user-home-technology-create'); ?>" method="post">
    <input type="text" name="technology" placeholder="ajouter une nouvelle technologie">
    <input type="submit" value=" + ">
</form>
<form action="<?= $router->generate('test-model-insert'); ?>" method="get">
    <label for="">choisir une technologie :</label>
    <select name="technology_id" id="">
            <option value="0">---</option>
        <?php foreach ($allTechnologies as $oneTechnology) : ?>
            <option value="<?= $oneTechnology->term_id; ?>"><?= $oneTechnology->name; ?></option>
        <?php endforeach; ?>
    </select>
    <label for="">choisir un niveau :</label>
    <select name="technology_level" id="">
            <option value="null">---</option>
            <option value="0">Débutant</option>
            <option value="1">Intermédiaire</option>
            <option value="2">Confirmé</option>
            <option value="3">Expert</option>
            <option value="4">Danse avec les stars</option>
    </select>
        <input type="submit" value="add technology">
    </form>
    </div>
<hr>
<br>
<div class="welcome__cta">
    <?php $deleteURL = $router->generate('user-delete'); ?>
    <ul>
        <li><a href="<?=$deleteURL?>">Supprimer mon compte</a></li>
        <li><a href="#">Changer mon mot de passe</a></li>
    </ul>
</div>







<?php get_footer();?>