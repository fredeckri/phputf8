DECLARE @json NVARCHAR(MAX);
SET @json = '{"info": {"address": [{"town": "Belgrade"}, {"town": "Paris"}, {"town":"Madrid"}]}}';
SET @json = JSON_MODIFY(@json, '$.info.address[1].town', 'London');
SELECT modifiedJson = @json;

SELECT id, firstName AS "info.name", lastName AS "info.surname", age, dateOfBirth AS dob
FROM People
FOR JSON PATH;

SELECT @@version as a for JSON PATH

