FROM python:3.10.7

RUN pip install psycopg2 && pip install faker

WORKDIR /app

COPY ./scripts/. ./app

#ENTRYPOINT ["python"]

CMD [ "python", "-m", "http.server", "5300"]

EXPOSE 5300
