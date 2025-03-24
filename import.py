import os
import shutil
import mysql.connector
from mysql.connector import Error

# Configuration
DB_CONFIG = {
    'host': 'localhost',         # Remplacez par votre hôte MySQL
    'user': 'scoutismebeninois', # Remplacez par votre utilisateur MySQL
    'password': 'aobpl?vhsdc1jrtz', # Remplacez par votre mot de passe MySQL
    'database': 'scoutismebeninois_db' # Remplacez par le nom de votre base de données
}
DESTINATION_FOLDER = "/home/scoutismebeninois/htdocs/assets/recovery"  # Dossier où les pièces jointes seront déplacées

# Créer le dossier principal s'il n'existe pas
if not os.path.exists(DESTINATION_FOLDER):
    os.makedirs(DESTINATION_FOLDER)

try:
    # Connexion à la base de données MySQL
    connection = mysql.connector.connect(**DB_CONFIG)
    if connection.is_connected():
        print("Connexion réussie à la base de données MySQL")

        cursor = connection.cursor()

        # Étape 1 : Récupérer tous les articles
        cursor.execute("SELECT idArticle FROM Article")
        articles = cursor.fetchall()

        for article in articles:
            article_id = article[0]

            # Étape 2 : Récupérer les pièces jointes pour l'article
            cursor.execute("SELECT filename FROM PieceJointe WHERE article_id = %s", (article_id,))
            pieces_jointes = cursor.fetchall()

            for piece in pieces_jointes:
                chemin_piece = "/home/scoutismebeninois/htdocs/assets/piecejointe/"+piece[0]
                # Vérifier si le fichier existe
                if os.path.exists(chemin_piece):
                    article_folder =  "/home/scoutismebeninois/htdocs/assets/recovery"
                    # Déplacer le fichier dans le dossier de l'article
                    shutil.move(chemin_piece,article_folder)
                    print(f"Pièce jointe {chemin_piece} déplacée vers {article_folder}")
                else:
                    print(f"Fichier introuvable : {chemin_piece}")

except Error as e:
    print(f"Erreur lors de l'accès à la base de données : {e}")

finally:
    if connection.is_connected():
        cursor.close()
        connection.close()
        print("Connexion à la base de données MySQL fermée")

print("Traitement terminé.")
