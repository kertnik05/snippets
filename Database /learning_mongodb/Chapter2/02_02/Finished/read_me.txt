$ mongoimport --help 
$ mongoimport --db <database_name> --collection <table_name> --jasonArray --file <filename.json> 

To run mongo server: Open a terminal -> mongod 
To run mongo client: Open a separate terminal -> mongo 
> use <database_name> 
//Create
> db.<table_name>.insert({"fieldName":"value","fieldName": 1, ,"fieldName": true})
//Read
> db.<table_name>.find({"fieldName":"value"})
//Update specific field 
> db.<table_name>.update({"fieldName":"value"},  //find the record to change 
    {$set: {"fieldName":"value"}}  //the specific field of the record to update 
)