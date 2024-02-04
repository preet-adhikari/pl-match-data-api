FROM postgres

ENV POSTGRES_USER=postgres \
    POSTGRES_PASSWORD=root \
    POSTGRES_DB=pl_match_data_api

COPY pl_match_data_dump.sql /docker-entrypoint-initdb.d/

