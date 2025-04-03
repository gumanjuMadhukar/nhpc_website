DROP VIEW IF EXISTS view_subject_committee_types CASCADE; 
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost`  VIEW `view_subject_committee_types` AS SELECT
	mst_subject_committee.*, 
	mst_subject_committee_type.`name` as subject_committee_type_name
FROM
	mst_subject_committee
	INNER JOIN
	mst_subject_committee_type
	ON 
		mst_subject_committee.subject_committee_type_id = mst_subject_committee_type.id