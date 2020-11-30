SELECT COUNT(*) AS CONSULTAS,
        CON.fecha_consulta AS FECHA, 
        DAT.tarifa_consulta AS TARIFA,
        SUM(DAT.tarifa_consulta) AS TOTAL 
FROM consultas CON, datos_medics DAT, pacientes PAC
WHERE DAT.fk_medico=1 and PAC.fk_medico=1 AND CON.fk_paciente=PAC.id_paciente AND 
CON.fecha_consulta BETWEEN '2020-11-26' and '2020-11-29' GROUP BY CON.fecha_consulta;
/* its wrong
SELECT COUNT(*) AS CONSULTAS,
        CON.fecha_consulta AS FECHA, 
        DAT.tarifa_consulta AS TARIFA,
        SUM(DAT.tarifa_consulta) AS TOTAL 
FROM consultas CON, datos_medics DAT
WHERE DAT.fk_medico=1 AND CON.fk_paciente=(SELECT id_paciente FROM pacientes WHERE fk_medico=1) 
AND  CON.fecha_consulta BETWEEN '2020-11-26' and '2020-11-29' GROUP BY CON.fecha_consulta;

select * from consultas where fk_paciente=(SELECT id_paciente FROM pacientes WHERE fk_medico=1);
*/
