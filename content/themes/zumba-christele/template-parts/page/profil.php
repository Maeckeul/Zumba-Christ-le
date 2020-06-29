<section class="intro">

        <div class="intro--presentation">
          Mon profil
        </div>
      </section>

      <section class="profil">
        <div class="profil__avatar">
          <img class="profil__avatar--img" src="https://c.pxhere.com/photos/1e/1e/girl_flowers_wreath_green_eyes_roses_red_beauty-619204.jpg!d">
          <a href="" class="profil__avatar--modif">Modifier l'image</a>
        </div>
        <form class="profil__form">
          <div>
          <div class="profil__form--field">
            <label for="name" class="profil__form--field--label">Nom / Prénom</label>
            <input type="text" id="name" name="user_name">
          </div>
          <div class="profil__form--field">
            <label for="birthday" class="profil__form--field--label">Date de naissance</label>
            <input type="text" id="birthday" name="user_birthday">
          </div>
          <div class="profil__form--field">
            <label for="address" class="profil__form--field--label">Adresse Postale</label>
            <input type="text" id="address" name="user_address">
          </div>
          </div>
          <div>
          <div class="profil__form--field">
            <label for="mail" class="profil__form--field--label">Email</label>
            <input type="email" id="mail" name="user_mail">
          </div>
          <div class="profil__form--field">
            <label for="password" class="profil__form--field--label">Mot de passe</label>
            <input type="text" id="password" name="user_password">
          </div>
          <div class="profil__form--field">
            <label for="tel" class="profil__form--field--label">Téléphone</label>
            <input type="number" id="tel" name="user_tel">
          </div>
        </div>
        </form>
      </section>
      <section class="reservation">
        <h2 class="intro--presentation">Mes réservations</h2>
        <div class="reservation__item">
          <p class="reservation__item--name">Cours X</p>
          <p class="reservation__item--content">le XX/XX/20XX</p>
          <a href="" class="reservation__item--delete">Annuler</a>
        </div>
      </section>
      <section class="comment">
        <h2 class="intro--presentation">Mes commentaires</h2>
        <div class="comment__item">
          <p class="comment__item--date">Le XX/XX/20XX à XXhXX</p>
          <p class="comment__item--content">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sequi quam unde ea praesentium alias dolor dolore consectetur vero nobis a?</p>
        </div> 
        <form class="comment__form">
          <label for="comment" class="comment__form--label">Nouveau commentaire</label>
          <textarea id="comment" name="user_comment"></textarea>
        </form>
        <div class="comment__form--button">
          <button type="submit" class="comment--button">Envoyer</button>
        </div>
      </section>
      <section class="delete">
        <a href="" class="delete__user">Supprimer mon compte</a>
      </section>