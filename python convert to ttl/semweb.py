import pandas as pd
from rdflib import Graph, Literal, RDF, URIRef, Namespace
from rdflib.namespace import XSD

# Read the CSV file
df = pd.read_csv('price.csv')

# Create a new RDF graph
g = Graph()

# Define a namespace for our data
EX = Namespace("http://example.org/")

# Iterate over the rows in the dataframe and create RDF triples
for index, row in df.iterrows():
    product_uri = URIRef(EX[f"product/{index}"])

    g.add((product_uri, RDF.type, EX.Product))
    g.add((product_uri, EX.brand, Literal(row['Brand'], datatype=XSD.string)))
    g.add((product_uri, EX.model, Literal(row['Model'], datatype=XSD.string)))
    g.add((product_uri, EX.type, Literal(row['Type'], datatype=XSD.string)))
    g.add((product_uri, EX.gender, Literal(row['Gender'], datatype=XSD.string)))
    g.add((product_uri, EX.size, Literal(row['Size'], datatype=XSD.string)))
    g.add((product_uri, EX.color, Literal(row['Color'], datatype=XSD.string)))
    g.add((product_uri, EX.material, Literal(row['Material'], datatype=XSD.string)))
    g.add((product_uri, EX.price, Literal(row['Price'], datatype=XSD.string)))

# Serialize the graph to Turtle format
turtle_data = g.serialize(format='turtle')

# Print or save the Turtle data
with open('price.ttl', 'w') as f:
    f.write(turtle_data)

print("Turtle RDF data has been written to 'price.ttl'")