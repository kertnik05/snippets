
- Install Java if not installed
- Download and unzip elasticsearch
    - bin - executables
    - config - configuration and can be raname to .json
    - data - index
    - lib -jar file
    - logs -debugging and analysis 

elasticsearch.yml
    - path.data: <path/foldername || foldername> 
    - path-logs: <path/foldername || foldername> 
    - cluster.name: <yourclustername>

Installing Elasticsearch
1. Make sure Install Jav 7 or higher 
    - javac -version
2. Download Elastic Search https://www.elastic.co/products/elasticsearch
2. $ bin/elasticsearch 
    - localhost:9200 
    - creates a cluster called elasticsearch 
    - creates a master node 
    - individual node is given a random name 
    - ctrl + C to stop elasticsearch 
3. $ curl <url:9200>
4. Configuring Elastic Search
    - Network and port of the elastic search server - only in production
    - https://www.udemy.com/elasticsearch-complete-guide/learn/v4/t/lecture/7429062?start=0
5. Download Kibana - https://www.elastic.co/products/kibana
    - port 45601 
    - Download Kibana 
    - $ tar -zxf kinbana
    - $ bin/kibana - to start 
        - go to your url:45601
        - ctrl + C to stop 
4. Configuring kibana - kibana.yml 
    - https://www.udemy.com/elasticsearch-complete-guide/learn/v4/t/lecture/7429072?start=0
5. Intro to kibana 
    - https://www.udemy.com/elasticsearch-complete-guide/learn/v4/t/lecture/7429078?start=0
    - $curl -XGET <kibanaconsolegearurl>
6. Creating Index 
    - PUT /<table_name>?pretty - pretty will make the result easy on the human eyes 
7. Adding Document to index through console of kibana
    - POST /<table_name>/default {
        "field_name": "value",
         "field_name": {
              "field_name": "value",
               "field_name": "value",
         },
    }   // http ver + endpoint 
    - PUT /<table_name>/default/<id:num> {
        "field_name": "value",
         "field_name": {
              "field_name": "value",
               "field_name": "value",
         },
    }   // http ver + endpoint 
    - get /<table_name>/default/<id:num> 
8. Updating Documents - Adding new fields
    - POST /<table_name>/default/<id:num>/_update
    {
        "doc": {
            "new_field_name": "value",
            "new_field_name": ["value"],
            "new_field_name": {
                    "field_name": "value",
                    "field_name": "value" }
        }
    }
9. Scripting Update 
     - POST /<table_name>/default/<id:num>/_update
     {
         "script": "ctx._source.<field_name> = newvalue" 
     } 
     
     or

     {
         "script": "ctx._source.<field_name> += 10" 
     }
     - More Example: https://www.elastic.co/guide/en/elasticsearch/reference/current/docs-update.html
     - https://www.elastic.co/guide/en/elasticsearch/reference/current/modules-scripting.html
     - GET /<table_name>/default/<id:num>
10. Upsert - updates the field if it exist, if not, it runs the upsert 
    - POST /<table_name>/default/<id:num>/_update
     {
         "script": "ctx._source.<field_name> += 10" 
         "upsert":{
             "price": 100;
         }
     } 
11. 
    - Deleting single Document 
        - DELETE /<table_name>/default/<id:num>
    - Deleting Mutiple Document
        - POST /<table_name>/_delete_by_query 
        {
            "query":{
                "match": {
                    "field_name": "value"
                }
            }
        }
12. Deleting Index
    - DELETE /<table_name> 
13. Batch Processing 
    - POST /<table_name>/default/_bulk
    {
        "index": {
            "_id": "100"
        }
    }
    {  "price": 100 }
    {
        "index": {
            "_id": "101"
        }
    }
    {  "price": 101 }
    - Batch Updating and Deleting 
    POST /<table_name>/default/_bulk
    {
        "update": {
            "_id": "100"
        }
    }
    {"doc": {  "price": 1000 }}
    {"delete": {  "_id": 101 }}
14. Importing Batch Data using Curl 
    -$ curl -H "Content-Type: application/json" -XPOST "http://localhost:9200/<table_name>/default/_bulk?pretty" --data-binary "@ptest-data.json" 
15. Exploring the cluster 
    - GET /_cat/health?v - https://www.elastic.co/guide/en/elasticsearch/reference/current/cluster.html
    - GET /_cat/nodes?v - https://www.elastic.co/guide/en/elasticsearch/reference/current/cat-nodes.html
    - GET /_cat/indices?v 
    - GET /_cat/allocation?v 
    - GET /_cat/shards?v 

 Mapping - or schema in mysql
16. Dynamic Mapping - By Default, when you Post your data elastic search will map the field automatically
    - Show Mappings
        - GET /<table_name>/default/_mapping 
17. Meta Fields 
    - _index - contains the name of the index to which a document belongs
    - _id - stores the id of the Documents
    - _source - contains the original json object used when indexing a document
    - _field_names - contains the names of every field that contains a non-null value 
    - _routing - stores the value used to route a document to a shard 
    - _version - stores the internal version of a document - the value is integer 
    - _meta - may be used to store custom data that is left untouched by Elastic search 

18. Field Data Types 
    - Core Data Types
        - text - "lorem ipsum" - optimal for full text searches 
        - keyword - tags, categories, email address (used for structrued data) - use for filtering or agrregations
        - numeric - long, short, integer, byte, float, scaled_float, half_float 
        - date - string, long, epoc 
        - boolean - true or false 
        - binary - base64. Not stored by default 
        - range - { "gte":10, "lte":20} integer_range, float_range, long_range, double_range, date_range 
    - Complex Data Types
        - object - json 
        - array 
        - array of objects - 
        {
            "persons": [
                { "name": "Bo Andersen" , "age": 28 },
                { "name": "Bo Andersen" , "age": 28 }
            ] 
        } becomes 
        {
            "persons.name": ["Bo Andersen" ,  "Bo Andersen" ],
            "persons.age": [ 28 , 28 ]
            
        } 
    - Geo Data Types
    - Specialized Data Types 




4.Installing Marvel Dashboard
    - bin/plugin -i elasticsearch/marvel/latest
    - localhost:9200/_plugin/marvel/kibana/index.html#/dashboard 



Data Ingestion
- Indexing Document
- Field Types - how elasticsearch classify field 
    - See how elasticsearch maps:
        - Get /library/books/_mapping 
        - string, numbers (bytes, short, long, integer, double, float), date, boolean, null
        binary files (base64), geopspatial, ipaddress, token bytes
    - Field types are implicitly defined by elasticsearch
        - prior inserting data, explicityly define the field types 
        - Put /library/books/_mapping {
            "properties" {
                "<fied_name>": {
                    "type": "string"
                }
                "<fied_name>": {
                    "type": "long"
                }
                "<fied_name>": {
                    "type": "date"
                }
            }
        }
- Text analysis - how field is broken down to a searchable token
- Routing - How elasticsearch which shard to put the document 
- Bulk Indexing - how to batch large list of update in a single command 

- localhost:9200/_plugin/marvel/sense/index.html
    - inserting data in the left pane:
        PUT /<index_name>/<doc_type>/<doc_id> { <your Json data} 
        POST /<index_name>/<doc_type>/<doc_id> { <your Json data} 
        ex. PUT /library/books/1 {"title": "exampele" , "publish_date": "July 2013" }
        - when inserted, it will show in the right pane
            - each time you update the specific document - the version number increased 
        - POST /library/books/1?version=1 {"title": "exampele" , "publish_date": "July 2013" }
    - Searching:
        - Get /library/_search/?q="exampele" or Get /library/_search/?q=49.99
    - See how elasticsearch maps:
        - Get /library/books/_mapping 
    - Deleting Data:
        DELETE /library/books or DELETE /library/books/1

Advanced Ingestiion Topics 
    - localhost:9200/_plugin/marvel/sense/index.html
        - To analyze string: 
            GET /library/analyze?text=Example+text&analyzer=whitespace 
        - to add analyzer to _mapping : https://www.elastic.co/guide/en/elasticsearch/reference/current/analysis-analyzers.html
            - Put /library/books/_mapping {
            "properties" {
                    "<fied_name>": {
                        "type": "string",
                        "analyzer: "whitespace" 
                    }
                    "<fied_name>": {
                        "type": "long",
                         "analyzer: "stop" 
                    }
                    "<fied_name>": {
                        "type": "date",
                        "analyzer: "pattern" 
                    }
                }
            }
        - Stemming - breaking words down to its root  by using english as analyzer 
            - Put /library/books/_mapping {
            "properties" {
                    "<fied_name>": {
                        "type": "string",
                        "analyzer: "english" 
                    }
                    "<fied_name>": {
                        "type": "long",
                         "analyzer: "stop" 
                    }
                    "<fied_name>": {
                        "type": "date",
                        "analyzer: "pattern" 
                    }
                }
            }
        - multi-field 
            "properties" {
                    "<fied_name>": {
                        "type": "string",
                        "analyzer: "english",
                        "fields": {
                            "basic": {
                                "type": "string",
                                "analyzer": "standard",
                                "boost": "1.5"
                            }
                        }
                    }
                    "<fied_name>": {
                        "type": "long",
                         "analyzer: "stop" 
                    }
                    "<fied_name>": {
                        "type": "date",
                        "analyzer: "pattern" 
                    }
                }
            }
        - Document Routing 
            - How document is stored in the available shard
                - default: routing is based in the hashed of doc id 
            - 1st way field based routing: PUT /library/books/_mapping {
                "_routing": {
                    "required": "true",
                    "path": "language"
                }
            }
            - 2nd Way Document routing: POST /library/books/1?routing=2  - to route to specific shard 
        - batch Ingestiion
            - POST /library/books/_bulk 
            {"index":{"_id": "1"}}{
                <yourjson>
            }
            {"index":{"_id": "2"}}{
                <yourjson>
            }
            - To see if ingestion was successful: Get/library/_stats

Querying Elasticsearch
- Basic Query Types
    - Terms
    - Match
    - Range
    - Filters
- Specialized Query Types

 - Query Domain Specific language (DSL)
    - instead of writing query string through URL: www.example.com/_search?q=:fieldname=value&fieldname=value
    - {
        "simple_query_string": {
            "query": "web design".
            "analyzer": "english",
            "fields", ["title^5","description"],
            "default_operator": "AND"
        }
    }
    - Term query
        GET /library/books/_search 
       - Basic
       {
            "query": {
                "term" : 
                { "title" : "Kimchy" } 
            }
        }
        - General Purpose: 
        {
            "query": {
                "match" : 
                { "title" : "Kimchy" } 
            }
        }
         - General Purpose: When searching for multiple string, the default is or operator
        {
            "query": {
                "match" : 
                { "title" : "Kimchy" } 
                { "operator" : "and" } 
            }
        }
        - Multi_match
        {
            "query": {
                "multi_match" : {
                "query":    "Book title",
                "fields": [ "title" ],
                "operator" : "and"
                }
            }
        }
        - Match_Phrase
         {
            "query": {
                "match_pharse" : {
                "title":    "Book title"
                }
            }
        }
        - Match_Phrase_prefix
         {
            "query": {
                "match_pharse_prefix" : {
                "title":    "Book tit"
                }
            }
        }
        - Match_Phrase_prefix
        {
            "query": {
                "range" : {
                    "age" : {
                        "gte" : 10,
                        "lte" : 20,
                        "boost" : 2.0
                    }
                }
            }
        }
        - Filter: gives an unrank list, faster than full query - cached
        {
            "query": {
                "filtered": {
                "query": {
                    "multi_match": {
                    "query": "my dog has fleas",
                    "fields": ["name", "keywords"]
                    }
                },
                "filter": {
                    "term": {"status": 2}
                }
                }
            }
        }






