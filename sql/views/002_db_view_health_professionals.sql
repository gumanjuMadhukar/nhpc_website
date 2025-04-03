DROP VIEW IF EXISTS view_health_professionals CASCADE; 
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `view_health_professionals` AS SELECT 
				id,program_id,created_at,created_by,updated_at,updated_by,deleted_at,deleted_by,
				CASE WHEN middle_name = '' THEN CONCAT(first_name,' ',last_name)
            ELSE CONCAT(first_name,' ',middle_name,' ',last_name)
       END  as full_name,
				email
				from 
				mst_health_professionals