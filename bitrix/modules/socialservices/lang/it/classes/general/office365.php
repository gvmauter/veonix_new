<?php
$MESS["MAIN_OPTION_COMMENT"] = "Usa un account Office365 per accedere.";
$MESS["socserv_office365_client_id"] = "ID client:";
$MESS["socserv_office365_client_secret"] = "Chiave:";
$MESS["socserv_office365_form_note"] = "Devi registrare l'applicazione in Azure AD usando <a href=\"https://msdn.microsoft.com/en-us/office/office365/howto/add-common-consent-manually\">il manuale</a>. <br>Inserisci questo indirizzo nel campo \"URL di risposta\": <a href=\"#URL#\">#URL#</a><br />Per abilitare l'autenticazione e gli account utente, seleziona l'autorizzazione <b>Accesso e lettura del profilo utente</b> per <b>Microsoft Graph</b>.<br />Per abilitare l'integrazione con Bitrix24.Drive, seleziona l'autorizzazione <b>Lettura e scrittura dei file utente</b> per <b>Office365 SharePoint Online</b>.<br /><br />Se hai aggiunto un nome di dominio aziendale (tenant), solo gli account Office365 di quel dominio saranno autorizzati all'autenticazione.<br /><br />Per abilitare l'autenticazione con le caselle di posta <b>\"Office365\"</b>, <b>\"Outlook\"</b> e <b>\"Exchange Online\"</b>:<br /> inserisci il seguente indirizzo nel campo \"Reindirizzamento URI\" della pagina \"Autenticazione\": <a href=\"#MAIL_URL#\">#MAIL_URL#</a><br /><br />Aggiungi queste autorizzazioni alla pagina \"Autorizzazioni API\":<li>\"IMAP.AccessAsUser.All\"</li><li>\"offline_access\"</li>";
$MESS["socserv_office365_tenant"] = "Tenant:";