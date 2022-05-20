# PROCEDIMENT PER LLOGAR CURSOS DES DE LA APP #
DELIMITER //
CREATE PROCEDURE llogarCursos(IN _desconte INT, IN _preu_final DOUBLE, IN _hores INT, IN _id_curs INT, IN _dni VARCHAR(9), IN _tipus VARCHAR(55))
 BEGIN
	 IF _tipus = 'individual' 
		THEN 
			INSERT INTO realitza_client (descompte, hores, data, id_curs, dni, preu_final)
			VALUES (_desconte, _hores, CURDATE(), _id_curs, _dni, _preu_final);
     ELSE IF _tipus = 'colecitu' 
		THEN 
			IF _dni IN (SELECT dni FROM fam_num) AND _id_curs IN (SELECT id FROM curs_colectiu)
				THEN
					IF (SELECT count(dni) FROM fam_num WHERE dni = _dni AND data_caducitat > NOW()) > 0
						THEN
							INSERT INTO realitza_fam (id_col, dni, data, descompte, preu_final)
							VALUES (_id_curs, _dni, CURDATE(), _desconte, _preu_final);
					ELSE
						SELECT "No tens el carnet de família nombrosa o el tens caducat";
					END IF;
			ELSE
				INSERT INTO realitza_colectiu (data, id_curs, dni, preu_final)
				VALUES (CURDATE(), _id_curs, _dni, _preu_final);
				#INSERT INTO realitza_colectiu (id_col, dni, data, descompte) 	
				#VALUES (_id_curs, _dni, _data, _desconte);						
			END IF;
	ELSE IF _tipus = 'federat' 
		THEN
			IF _dni IN (SELECT dni from federat)
				THEN
					IF 
						(SELECT count(dni) FROM federat WHERE dni = _dni AND data_caducitat > NOW()) > 0
					THEN
						INSERT INTO realitza_comp (id_comp, dni, data)
						VALUES (_id_curs, _dni, CURDATE());
					ELSE
						SELECT "No tens el carnet de federat o el tens caducat";
					END IF;
			ELSE
				SELECT "No tens el carnet de federat o el tens caducat";
				END IF;
            END IF;
		END IF;
     END IF;
 END;
//
##CALL llogarCursos(descompte, preu_final, hores, id_curs, dni, tipus)##
#CALL llogarCursos(40,50.95,5,2,'12345678e','individual');				# curs: 2,5 	|| client: 12345678e ||
#CALL llogarCursos(60,24.20,0,4,'12345678e','colecitu');				# curs: 1,3,4  	|| client: 12345678e <-en individual que hauria de poder fer un colectiu
#CALL llogarCursos(40,25.50,0,4,'12345678c','colecitu'); 				# curs: 1,3,4	|| client: 12345678a , 12345678c <-familia numbrosa
#CALL llogarCursos(100,50.55,10,6,'12345678b','federat');			# curs: 6,7		|| client: 12345678b , 12345678d <-federat
CALL llogarCursos(60,40.00,2,7,'12345678a','federat'); #malament
