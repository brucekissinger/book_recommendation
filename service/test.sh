#!/bin/sh

#
# These scripts are used to load the Book services into the Cloudi engine
#

# Add the current directory to the code path
#curl -X POST -d '"'`pwd`'"' http://localhost:6467/cloudi/api/erlang/code_path_add
curl -X POST -d "/opt/cloudi/book/beam" http://localhost:6467/cloudi/api/erlang/code_path_add

# Compile all Erlang modules
#erlc -pz /usr/local/lib/cloudi-1.3.3/lib/cloudi_core-1.3.3 -pz /usr/local/lib/cloudi-1.3.3/lib/cloudi_core-1.3.3/ebin book.erl 

# Remove the Book service if it exists
#curl -X POST -d '[<<42,171,226,80,89,133,17,228,181,226,166,57,0,0,4,81>>]' http://localhost:6467/cloudi/api/erlang/services_remove 

# Add the Book service
curl -X POST -d @book.conf http://localhost:6467/cloudi/api/erlang/services_add

# Display list of services
#curl http://localhost:6467/cloudi/api/erlang/services 

# Call the Book Service
#curl http://localhost:6467/recommendation/book?item=1
#curl http://localhost:6467/recommendation/book?item=45388
curl -X POST -d "item=1" http://localhost:6467/recommendation/book 

#typer -pa /usr/local/lib/cloudi-1.3.3/lib/cloudi_core-1.3.3 -pa /usr/local/lib/cloudi-1.3.3/lib/cloudi_core-1.3.3/ebin book.erl 

#dialyzer -pa /usr/local/lib/cloudi-1.3.3/lib/cloudi_core-1.3.3 -pa /usr/local/lib/cloudi-1.3.3/lib/cloudi_core-1.3.3/ebin book.erl 

# Generate documentation
#erl -noshell -run edoc_run packages '[""]' '[{source_path, ["."]}, {dir, "edoc"}]'
