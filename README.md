Your team is required to implement a service for a school. The application supports 2 types of users: student and teacher.
Implement a register endpoint (POST). The user data has the following fields:
- school_identifier
(T) begins with one of "TEA","TEACH","TEACHER" followed by a "-", the next 4 characters must be digits, a "-" follows and the last part can have minimum 1 and maximum 3 alphanumeric characters
(S) begins with one of "ST", "STUD", "STUDENT" followed by a "-", the next 4 characers must be digits, a "-" follows and the last part can have minimum 2 and maximum 6 alphanumeric characters
Ex: TEACH-5649-a26, ST-6555-abb54d

- email
(T) must end in "@{school_provider}.com" because teachers must have a school email account set. the replacement for "school_provider" must be configured in a separate file and switched whenever the school wants (the school can also accept multiple providers)
(S) must be provided by gmail/yahoo or by the school itself (so the rule for teachers apllies)

- first name
~ it's on you to decide how to validate this one (just keep in mind our school may have teachers with "weird" letters in their names)

- last name 
~ same as above

-### password and confirm_password
~ you have 4 available password strengths: WEAK, MEDIUM, STRONG and RIDICULOUS (strength is configured in separate configuration file) and their rules are as follows
~WEAK: must have a minimum of 6 characters #####
~MEDIUM: must have a minimum of 8 characters with at least one upper case letter##
~STRONG: must have a minimum of 10 character, at least one upper case letter, at least one digit and at least a non-alphanumeric character
~RIDICULOUS: must obey the STRONG rules AND not contain the first name or last name (case insensitive) 
!You must hash the password when you save it

- entry_date and start_date
~ represent 2 dates (the date when the user registered his/her file with the school and the other one is the date when they start working/taking classes)
~ you must validate that the entry_date is smaller than the start date with a given amount of days (also stored in the configuration file) 

MANDATORY: 
- Implement the register endpoint with all the validations and save the user data in a database/text file. You must validate all fields and the response must contain either a success json or an error json array with  all the errors you encountered when validating input data.
- OOP 
If you are done with this, we can talk about some additional stuff to do.
