<?php
$MESS["MAIN_OPTION_COMMENT"] = "Utiliser un compte Office365 pour se connecter.";
$MESS["socserv_office365_client_id"] = "ID du client : ";
$MESS["socserv_office365_client_secret"] = "Clé : ";
$MESS["socserv_office365_form_note"] = "Vous devez enregistrer l'application dans Azure AD en suivant <a href=\"https://msdn.microsoft.com/en-us/office/office365/howto/add-common-consent-manually\">le manuel</a>. <br>Saisissez cette adresse dans le champ \"URL de réponse\" : <a href=\"#URL#\">#URL#</a>.<br />Pour activer l'authentification et les comptes utilisateurs, sélectionnez la permission <b>Se connecter et lire le profil utilisateur</b> pour <b>Microsoft Graph</b>.<br />Pour activer l'intégration Bitrix24.Drive, sélectionnez la permission <b>Lire et écrire dans les fichiers utilisateur</b> pour <b>Office365 SharePoint Online</b>.<br /><br />Si vous avez ajouté un nom de domaine d'entreprise (tenant), seuls les comptes Office365 de ce domaine pourront s'authentifier.<br /><br />Pour activer l'authentification avec boîtes <b>\"Office365\"</b>, <b>\"Outlook\"</b> et <b>\"Exchange Online\"</b> :<br /> saisissez l'adresse suivante dans le champ \"Rediriger les URI\" de la page \"Authentification\" : <a href=\"#MAIL_URL#\">#MAIL_URL#</a><br /><br />Ajoutez ces permissions sur la page \"Permissions d'API\" :<li>\"IMAP.AccessAsUser.All\"</li><li>\"offline_access\"</li>";
$MESS["socserv_office365_tenant"] = "Tenant : ";